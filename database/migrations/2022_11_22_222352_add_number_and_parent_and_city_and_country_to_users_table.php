<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberAndParentAndCityAndCountryToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('number');
            $table->string('parent')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('status');
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
            $table->dropColumn('number');
            $table->dropColumn('parent')->nullable();
            $table->dropColumn('city')->nullable();
            $table->dropColumn('country')->nullable();
            $table->dropColumn('status');
        });
    }
}
