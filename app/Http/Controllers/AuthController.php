<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->isCandidato()) {
                return response()->json([
                    'message' => 'Login realizado com sucesso!',
                    'redirect_to' => '/candidato/dashboard',
                ]);
                // return response()->json(['message' => 'Bem-vindo, Candidato!', 'user' => $user]);
            }

            if ($user->isAdmin()) {
                return response()->json([
                    'message' => 'Login realizado com sucesso!',
                    'redirect_to' => '/admin/dashboard',
                ]);
                // return response()->json(['message' => 'Bem-vindo, Administrador!', 'user' => $user]);
            }
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }
}
