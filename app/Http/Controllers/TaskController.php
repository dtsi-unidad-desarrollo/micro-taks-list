<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Crear una nueva tarea
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            //   Aquí podrian ir  otras validaciones necesarias
        ]);

        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    // Para actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            //  Aquí podrian ir  otras validaciones necesarias
        ]);

        $task->update($validatedData);

        return response()->json($task, 200);
    }
}
