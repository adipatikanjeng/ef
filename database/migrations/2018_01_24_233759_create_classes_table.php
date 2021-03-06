<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_user_id')->unsigned();
            $table->integer('teacher_user_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('test_score')->nullable();
            $table->text('teacher_notes')->nullable();
            $table->string('class_code');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
