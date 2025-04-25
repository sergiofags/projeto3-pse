<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (($role === 'candidato' && $user->isCandidato()) ||
            ($role === 'admin' && $user->isAdmin())) {
            return $next($request);
        }

        return response()->json(['error' => 'Acesso negado'], 403);
    }
}
