<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskHistoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('task_histories', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('task_id');
      $table->string('action'); // Acción realizada (por ejemplo: Cambio de estado, Asignación, Reasignación)
      $table->unsignedBigInteger('user_id')->nullable(); // Usuario que realizó la acción
      $table->timestamp('created_at')->useCurrent(); // Fecha y hora de la acción

      // Definir las claves foráneas
      $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('task_histories');
  }
}
