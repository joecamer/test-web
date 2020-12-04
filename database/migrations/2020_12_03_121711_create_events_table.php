<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->id();
      $table->string('event_name')->nullable();
      $table->date('event_date');
      $table->integer('start_time')->unsigned();
      $table->smallInteger('end_time')->unsigned();
      $table->unsignedBigInteger('room_id');
      $table->unsignedBigInteger('user_id');

      // les cles etrangeres
      $table->foreign('room_id')
        ->references('id')
        ->on('rooms')
        ->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users');

      // Les timestamps
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('events');
  }
}
