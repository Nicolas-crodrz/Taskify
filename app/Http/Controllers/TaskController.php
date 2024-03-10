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
      'status' => 'required|string|in:Pendiente,En Proceso,Terminada,Personalizado',
      'custom_status' => 'nullable|string|max:255', // Validar el estado personalizado si se proporciona
    ]);

    // Crear un array con los datos de la tarea
    $taskData = [
      'title' => $request->title,
      'description' => $request->description,
      'user_id' => $request->user_id,
      'status' => $request->status, // Usar el estado proporcionado por el usuario
    ];

    // Si el estado es 'Personalizado', usar el valor del campo personalizado
    if ($request->status === 'Personalizado') {
      $taskData['status'] = $request->custom_status;
    }

    // Crear la tarea
    Task::create($taskData);

    // Redireccionar al usuario a la página de índice de tareas con un mensaje de éxito
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
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'status' => 'required|string|in:Pendiente,En Proceso,Terminado,Custom', // Añadido Custom
      'completed_at' => 'nullable|date', // Validar la fecha de finalización si se proporciona
      'custom_status' => 'nullable|string|max:255', // Validar el estado personalizado si se proporciona
    ]);

    $data = [
      'title' => $request->title,
      'description' => $request->description,
      'status' => $request->status,
    ];

    // Si el estado es 'Terminado', actualizar la fecha de finalización
    if ($request->status == 'Terminado') {
      $data['completed_at'] = $request->completed_at ?: now(); // Usa la fecha actual si no se proporciona
    } else {
      $data['completed_at'] = null;
    }

    // Si el estado es 'Personalizado', usar el valor del campo personalizado
    if ($request->status === 'Custom') {
      $data['status'] = $request->custom_status;
    } else {
      // Si el estado no es 'Personalizado', asegurarse de limpiar el campo de estado personalizado
      $data['custom_status'] = null;
    }

    $task->update($data);

    return redirect()->route('tasks.index')->with('success', 'La tarea ha sido actualizada correctamente.');
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
