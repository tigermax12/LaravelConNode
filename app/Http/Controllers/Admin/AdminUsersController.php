<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function delete($id){
        try {
            $user= User::findOrFail($id);
            if($user->peticiones->count() > 0){
                return back()->withErrors(['error'=>'El usuario tiene peticiones creadas']);
            }
            $user->delete();
            return back()->with(['success'=>'El usuario fue eliminado']);
        } catch (\Exception $e) {
            return back()->withErrors(['error'=>'El usuario no pudo ser eliminado']);
        }
    }
}
