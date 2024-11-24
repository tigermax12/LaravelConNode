<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;

class PeticioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peticiones = Peticione::all();
        return view('peticiones.index', compact('peticiones'));
    }

    public function listMine(Request $request)
    {
        //parent::index()
        //$user= Auth::user();
        $id = 1;
        $peticiones = Peticione::all()->where('user_id', $id);
        return view('peticiones.mine', compact('peticiones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userid = 1;
        $categoria = 1;
        $estado = "pendiente";
        $firmantes=0;
        $validator  = Validator::make($request->all(), [
            'titulo' => 'string|required',
            'descripcion' => 'string|required',
            'destinatario' => 'string|required',
        ]);
        try {
            $validator->validate();
        }
        catch (\Exception $e) {
            return view('home');
        }
        $peticiones = new Peticione();
        $peticiones['titulo'] = $request->get('titulo');
        $peticiones['user_id'] = $userid;
        $peticiones['categoria_id'] = $categoria;
        $peticiones['estado'] = $estado;
        $peticiones['descripcion'] = $request->get('descripcion');
        $peticiones['destinatario'] = $request->get('destinatario');
        $peticiones['firmantes']=$firmantes;
        $peticiones->save();
        return view('peticiones.show', compact('peticiones'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $peticiones = Peticione::query()->findOrFail($id);
        return view('peticiones.show', compact('peticiones'));
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
        return view('peticiones.create',compact('categorias'));
    }
    public function firmar(Request $request, $id)
    {
        $peticion = Peticione::query()->findOrFail($id);
        //$user = Auth::user();
        $user = 1;
        $user_id = [$user];
        //$user_id = [$user‐>id];
        $peticion->firmas()->attach($user_id);
        $peticion->firmantes = $peticion->firmantes + 1;
        $peticion->save();
        return $peticion;
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
