<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anio;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class userController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.userCrud.index', compact('users'));
    }

    public function create()
    {
        $anios = Anio::all();

        return view('admin.userCrud.create', compact('anios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.userCrud.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
    
        // Actualizar solo los campos obligatorios
        $user->fill($request->only(['name', 'email']));
    
        // Actualizar la contraseña solo si se proporciona
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }
    
    

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }
}
