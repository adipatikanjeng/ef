<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('lessons', function (Blueprint $table) {
            $table->integer('lesson_parent_id')->unsigned()->after('course_id')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('lesson_parent_id');
        });
    }
}
