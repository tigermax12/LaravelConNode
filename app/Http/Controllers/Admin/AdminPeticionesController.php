<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class AdminPeticionesController extends Controller
{
    public function index(Request $request)
    {
        $peticiones = Peticione::paginate(2);
        return view('admin.peticiones.index', compact('peticiones'));
    }

    public function delete(Request $request, $id){
        try {
            $peticiones = Peticione::findOrFail($id);
            if ($peticiones->firmas()->count()>0) {
                return back()->withError("No se puede eliminar una peticion firmada");
            }

            $peticiones->file->delete();

            $peticiones->delete();
            return $this->index($request);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
    public function show($id)
    {
        try{
            $peticion = Peticione::query()->findOrFail($id);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('admin.peticiones.show', compact('peticion'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.peticiones.create', compact('categorias'));
    }
    function fileUpload(Request $req, $peticione_id = null)
    {
        $file = $req->file('file');
        $fileModel = new File;
        $fileModel->peticione_id = $peticione_id;
        if ($req->file('file')) {
            //return $req->file('file');

            $filename = $fileName = time() . '_' . $file->getClientOriginalName();
            //      Storage::put($filename, file_get_contents($req->file('file')->getRealPath()));
            $file->move('peticiones', $filename);

            //  Storage::put($filename, file_get_contents($request->file('file')->getRealPath()));
            //   $file->move('storage/', $name);


            //$filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            //    $filePath = $req->file('file')->storeAs('/peticiones', $fileName, 'local');
            // return $filePath;
            $fileModel->name = $filename;
            $fileModel->file_path = $filename;
            $res = $fileModel->save();
            return $fileModel;
            if ($res) {
                return 0;
            } else {
                return 1;
            }
        }
        return 1;

        return response()->json(['error' => 'No se recibió ningún archivo.'], 400);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'categoria_id' => 'required',
            'file' => 'required',
        ]);
        $input = $request->all();
        try {
            $categoria = Categoria::query()->findOrFail($input['categoria_id']);
            $user = Auth::id(); //asociarlo al usuario authenticado
            $peticion = new Peticione($input);
            $peticion->categoria()->associate($categoria);
            $peticion->user()->associate($user);
            $peticion->firmantes = 0;
            $peticion->estado = 'pendiente';
            $res = $peticion->save();
            if ($res) {
                $res_file = $this->fileUpload($request, $peticion->id);
                if ($res_file) {
                    //return redirect('/mispeticiones');
                    return view('admin.peticiones.show', compact('peticion'));
                }
                return back()->withError('Error creando la peticion')->withInput();
            }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function edit($id){
        $peticion = Peticione::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.peticiones.edit', compact('peticion', 'categorias'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'file' => 'nullable|file', // El archivo es opcional pero debe ser válido
        ]);

        try {
            // Buscar la petición existente
            $peticion = Peticione::findOrFail($id);

            // Actualizar los datos básicos
            $peticion->titulo = $request->input('titulo');
            $peticion->descripcion = $request->input('descripcion');
            $peticion->destinatario = $request->input('destinatario');
            $peticion->categoria_id = $request->input('categoria_id');

            // Si se sube un nuevo archivo, manejarlo
            if ($request->hasFile('file')) {
                // Eliminar el archivo anterior si existe
                if ($peticion->file) {
                    $peticion->file->delete();
                }
                $res_file = $this->fileUpload($request, $peticion->id);
            }

            // Guardar la petición
            if ($peticion->save()) {
                return redirect()->route('adminpeticiones.show', $peticion->id)
                    ->with('success', 'La petición se actualizó correctamente.');
            }

            return back()->withError('Error al actualizar la petición.')->withInput();
        } catch (\Exception $exception) {
            return back()->withError('Ocurrió un error: ' . $exception->getMessage())->withInput();
        }
    }
    public function cambiarEstado(Request $request, $id)
    {
        $peticiones = Peticione::query()->findOrFail($id);
        $peticiones->estado = 'aceptada';
        $peticiones->save();
        return redirect()->back();
    }
}
