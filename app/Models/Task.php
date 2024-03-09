<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $fillable = [
    'title', 'description', 'status', 'completed_at', 'user_id', // Asegúrate de incluir 'user_id' aquí
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function createdBy()
  {
    return $this->belongsTo(User::class, 'user_id'); // Cambiado a 'user_id'
  }
}
