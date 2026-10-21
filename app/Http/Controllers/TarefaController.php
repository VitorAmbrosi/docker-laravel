<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tarefa::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefaRequest $request)
    {
        $tarefa = Tarefa::create($request->all());
        return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tarefa = Tarefa::findOrFail($id);
            return response()->json($tarefa, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefaRequest $request, string $id)
    {
        $tarefa = Tarefa::findOrFail($id); // Busca a tarefa pelo ID ou retorna um erro 404 se não encontrada
        $tarefa->update($request->all()); // Atualiza a tarefa com os dados fornecidos na requisição
        return response()->json($tarefa, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();
        return response()->json(null, 204);
    }
}
