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
        $categorias = Categoria::paginate(2);
        return view('admin.categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('admin.categorias.create');
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
        return redirect()->route('admincategorias.index', $categorias->id)
            ->with('success', 'La categoria se creo correctamente.');
    }

    public function delete($id){
        try {
            $categorias= Categoria::findOrFail($id);
            if($categorias->peticiones->count() > 0){
                return back()->withErrors(['error'=>'La categoria esta en peticiones creadas']);
            }
            $categorias->delete();
            return back()->with(['success'=>'La categoria fue eliminada']);
        } catch (\Exception $e) {
            return back()->withErrors(['error'=>'La categoria no pudo ser eliminada']);
        }
    }
}
