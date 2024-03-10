<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
  use HasFactory;

  protected $fillable = [
    'task_id',
    'action',
    'user_id',
    // Otros campos necesarios para el historial
  ];
  public $timestamps = false; // Deshabilitar marcas de tiempo
  // Definir la relación con la tarea
  public function task()
  {
    return $this->belongsTo(Task::class);
  }

  // Definir la relación con el usuario que realizó la acción
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
