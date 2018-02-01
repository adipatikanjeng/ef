<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->default(null)->after('name');
            $table->string('surname')->default(null)->after('nickname');
            $table->string('phone_number')->default(null)->after('surname');
            $table->string('grade')->default(null)->after('phone_number');
            $table->string('school')->default(null)->after('grade');
            $table->string('avatar')->default(null)->after('school');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('surname');
            $table->dropColumn('phone_number');
            $table->dropColumn('grade');
            $table->dropColumn('school');
            $table->dropColumn('avatar');
        });
    }
}
