<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class AdminCategoriasController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::paginate(10);
        return view('admin.categorias.index', compact('categorias'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $categorias = Categoria::create([
            'nombre' => $request->get('nombre')
        ]);
        return redirect()->route('adminpeticiones.show', $categorias->id)
            ->with('success', 'La petición se actualizó correctamente.');
    }
    public function show($id)
    {
        try{
            $categorias = Peticione::query()->findOrFail($id);
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
        return view('admin.peticiones.show', compact('categorias'));
    }

}
