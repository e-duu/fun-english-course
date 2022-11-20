<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->enum('role', ['admin_head', 'admin_staff', 'teacher', 'student']);
            $table->enum('status', ['active', 'non-active']);
            $table->string('photo')->nullable();
            $table->string('parent')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
}
