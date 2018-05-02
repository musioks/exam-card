<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adm_no')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('dob');
            $table->string('gender');
            $table->string('religion');
            $table->integer('form_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('parent_name');
            $table->string('parent_contact');
            $table->string('photo')->default('student.png');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
