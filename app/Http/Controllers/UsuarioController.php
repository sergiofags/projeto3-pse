<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'tipo_perfil' => 'nullable|string|max:255',
        ]);

        $usuario = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'tipo_perfil' => $validatedData['tipo_perfil'] ?? null,
        ]);

        return response()->json($usuario, 201);
    }

    public function update(Request $request, User $usuario)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:6',
            'tipo_perfil' => 'nullable|string|max:255',
        ]);

        $usuario->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $usuario->password,
            'tipo_perfil' => $validatedData['tipo_perfil'] ?? $usuario->tipo_perfil,
        ]);

        return response()->json($usuario);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete(); // Deleta o usuário
        return response()->json(['message' => 'Usuário deletado com sucesso!']);
    }
}