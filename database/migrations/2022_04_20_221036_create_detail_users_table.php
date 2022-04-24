<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->string('parent');
            $table->string('city');
            $table->string('country');
            $table->enum('status', ['active', 'non-active']);
            $table->foreignId('user_id');
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
        Schema::dropIfExists('detail_users');
    }
}
