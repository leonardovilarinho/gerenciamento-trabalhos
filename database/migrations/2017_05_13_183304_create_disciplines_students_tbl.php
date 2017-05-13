<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesStudentsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned()->unique();
            $table->foreign('student_id')
              ->references('user_id')
              ->on('students')
            ->onDelete('cascade');

            $table->integer('discipline_id')->unsigned()->unique();
            $table->foreign('discipline_id')
              ->references('id')
              ->on('disciplines')
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
        Schema::dropIfExists('disciplines_students');
    }
}
