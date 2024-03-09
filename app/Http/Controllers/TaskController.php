<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
  public function index()
  {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
  }

  public function create()
  {
    $users = User::all();
    return view('tasks.create', compact('users'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'user_id' => 'required|exists:users,id',
    ]);

    Task::create([
      'title' => $request->title,
      'description' => $request->description,
      'user_id' => $request->user_id,
      'status' => 'Pendiente', // O cualquier otro valor predeterminado
    ]);

    return redirect()->route('tasks.index')->with('success', 'La tarea ha sido creada correctamente.');
  }

  public function show(Task $task)
  {
    $task->load('user'); // Cargar la relación user
    return view('tasks.show', compact('task'));
  }

  public function update(Request $request, Task $task)
  {
    $request->validate([
      'status' => 'required|in:Pendiente,En Proceso,Terminada',
    ]);
    $data = [
      'status' => $request->status,
    ];
    // Si la tarea se marca como "Terminada", registra la fecha de finalización
    if ($request->status == 'Terminada') {
      $data['completed_at'] = now();
    } else {
      $data['completed_at'] = null;
    }
    $task->update($data);
    return redirect()->route('tasks.index')->with('success', 'El estado de la tarea ha sido actualizado correctamente.');
  }


  public function destroy(Task $task)
  {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'La tarea ha sido eliminada correctamente.');
  }

  public function edit(Task $task)
  {
    $users = User::all(); // Esto es opcional, si necesitas mostrar una lista de usuarios en el formulario de edición
    return view('tasks.edit', compact('task', 'users'));
  }
}
