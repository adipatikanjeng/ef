<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('grade')->default(null)->nullable()->change();
            $table->string('school')->default(null)->nullable()->change();
            $table->string('avatar')->default(null)->nullable()->change();
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
            $table->string('grade')->default(null);
            $table->string('school')->default(null)->after('grade')->change();
            $table->string('avatar')->default(null)->after('school')->change();
        });
    }
}
