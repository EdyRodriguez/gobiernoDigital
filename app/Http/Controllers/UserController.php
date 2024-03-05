<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function __construct()
    {
        // Solo los usuarios autenticados pueden acceder a las rutas de este controlador
        $this->middleware('auth:api');
        $this->middleware('role:administrador', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        // Solo administradores pueden crear usuarios
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al crear el usuario'], 500);
        }
    }

    public function show($id)
    {
        // Todos los usuarios pueden ver detalles de un usuario específico
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Solo administradores pueden actualizar usuarios
        $user = User::findOrFail($id);

        try{
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($id)],
                'password' => 'required|string|min:6',
            ]);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Datos de usuario incorrectos'], 500);
        }


        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        try{
            $user->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al actualizar el usuario'], 500);
        }
        return response()->json($user);
    }

    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al eliminar el usuario'], 500);
        }
        return response()->json("Usuario Eliminado correctamente", 200);
    }
}
