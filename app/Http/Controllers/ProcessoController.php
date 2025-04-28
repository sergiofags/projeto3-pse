<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProcessoController extends Controller
{
    public function index()
    {
        $processos = Processo::all();
        return response()->json($processos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date',
            'numero_processo' => 'required|string|max:255',
            'edital' => 'nullable|string|max:255',
        ]);

        $proesso = Processo::create([
            'status' => $validatedData['status'],
            'data_inicio' => $validatedData['data_inicio'],
            'data_fim' => $validatedData['data_fim'],
            'numero_processo' => $validatedData['numero_processo'],
            'edital' => $validatedData['edital'],
        ]);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date',
            'numero_processo' => 'required|string|max:255',
            'edital' => 'nullable|string|max:255',
        ]);

        $proesso->update([
            'status' => $validatedData['status'],
            'data_inicio' => $validatedData['data_inicio'],
            'data_fim' => $validatedData['data_fim'],
            'numero_processo' => $validatedData['numero_processo'],
            'edital' => $validatedData['edital'],
        ]);

        return response()->json($processo);
    }
}