<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PeticioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $peticiones = Peticione::all();
        return view('peticiones.index', compact('peticiones'));
    }

    public function listMine(Request $request)
    {
        //parent::index()
        $user = Auth::id();
        $peticiones = Peticione::all()->where('user_id', $user);
        return view('peticiones.mine', compact('peticiones'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
                    return view('peticiones.show', compact('peticion'));
                }
                return back()->withError('Error creando la peticion')->withInput();
            }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function peticionesFirmadas(Request $request)
    {
        try {
            $user = Auth::user();
            $peticiones = $user->firmas;
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('peticiones.peticionesfirmadas', compact('peticiones'));
    }


    public
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $peticion = Peticione::query()->findOrFail($id);
        return view('peticiones.show', compact('peticion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peticion = Peticione::query()->findOrFail($id);
        $peticion->update($request->all());
        return $peticion;
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('peticiones.create', compact('categorias'));
    }

    public function firmar(Request $request, $id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            $user = Auth::user();
            $firmas = $peticion->firmas;
            foreach ($firmas as $firma) {
                if ($firma->id == $user->id) {
                    return back()->withError("Ya has firmado esta petición")->withInput();
                }
            }
            $user_id = [$user->id];
            $peticion->firmas()->attach($user_id);
            $peticion->firmantes = $peticion->firmantes + 1;
            $peticion->save();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back();
    }

    public function cambiarEstado(Request $request, $id)
    {
        $peticion = Peticione::query()->findOrFail($id);
        $peticion->estado = 'aceptada';
        $peticion->save();
        return $peticion;
    }

    public function delete(Request $request, $id)
    {
        $peticion = Peticione::query()->findOrFail($id);
        $peticion->delete();
        return response()->json(['message' => 'Petición eliminada correctamente.']);
    }
}
