<?php

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
            $table->integer('id');
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('school')->nullable();
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('diem')->nullable();
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
        Schema::drop('students');
    }
}
