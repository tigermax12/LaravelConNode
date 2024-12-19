<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(2);
        return view('admin.users.index', compact('users'));
    }
    public function delete($id){
        try {
            $users= User::findOrFail($id);
            if($users->peticiones->count() > 0){
                return back()->withErrors(['error'=>'El usuario tiene peticiones creadas']);
            }
            $users->delete();
            return back()->with(['success'=>'El usuario fue eliminado']);
        } catch (\Exception $e) {
            return back()->withErrors(['error'=>'El usuario no pudo ser eliminado']);
        }
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->get('role_id'),
        ]);

        return redirect()->route('adminusers.index')
            ->with('success', 'El usuario ha sido creado.');
    }
}
