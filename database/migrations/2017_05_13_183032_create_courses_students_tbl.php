<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesStudentsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
              ->references('user_id')
              ->on('students')
            ->onDelete('cascade');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
              ->references('id')
              ->on('courses')
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
        Schema::dropIfExists('courses_students');
    }
}
