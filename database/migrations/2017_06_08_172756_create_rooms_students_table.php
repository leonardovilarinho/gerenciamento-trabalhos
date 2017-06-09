<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_students', function (Blueprint $table) {
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')
              ->references('id')
              ->on('rooms')
            ->onDelete('cascade');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
              ->references('user_id')
              ->on('students')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_students');
    }
}
