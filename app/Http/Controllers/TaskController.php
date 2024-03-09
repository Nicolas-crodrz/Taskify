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
      'status' => 'required|string|in:Pendiente,En Proceso,Terminada,Personalizado', // Corregido
    ]);

    // Crea un array con los datos de la tarea
    $taskData = [
      'title' => $request->title,
      'description' => $request->description,
      'user_id' => $request->user_id,
      'status' => $request->status, // Usa el estado proporcionado por el usuario
    ];

    // Si el estado es 'Personalizado', utiliza el valor del campo personalizado
    if ($request->status === 'Personalizado') {
      $taskData['status'] = $request->custom_status;
    }

    // Crea la tarea
    Task::create($taskData);

    // Redirecciona al usuario a la página de índice de tareas con un mensaje de éxito
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
    ]);

    $data = [
      'title' => $request->title,
      'description' => $request->description,
      'status' => $request->status,
    ];

    // Si el estado es 'Terminado', se actualiza la fecha de finalización
    if ($request->status == 'Terminado') {
      $data['completed_at'] = now();
    } else {
      $data['completed_at'] = null;
    }

    // Si el estado es 'Custom', se guarda el valor personalizado del estado
    if ($request->status == 'Custom') {
      // Verifica si se envió un valor personalizado y asegúrate de guardarlo correctamente
      if ($request->has('custom_status')) {
        $data['status'] = $request->custom_status;
      }
    } else {
      // Si el estado no es 'Custom', asegúrate de limpiar el campo de estado personalizado
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
