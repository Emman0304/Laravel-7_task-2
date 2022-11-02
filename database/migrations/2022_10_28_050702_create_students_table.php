<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('student_no');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->integer('age');
            $table->string('gender');
            $table->string('bday');
            $table->string('bplace');
            $table->string('contact');
            $table->string('email');
            $table->string('address');
            $table->string('img_alt')->nullable();
            $table->string('img_src')->nullable();
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
