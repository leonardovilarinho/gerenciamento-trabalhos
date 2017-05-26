<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsStudentsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
              ->references('user_id')
              ->on('students')
            ->onDelete('cascade');

            $table->integer('submission_id')->unsigned();
            $table->foreign('submission_id')
              ->references('id')
              ->on('submissions')
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
        Schema::dropIfExists('submissions_students');
    }
}
