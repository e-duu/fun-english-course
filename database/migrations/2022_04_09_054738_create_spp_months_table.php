<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_months', function (Blueprint $table) {
            $table->id();
            $table->integer('month');
            $table->enum('status', ['paid', 'unpaid', 'paid_manually', 'failed'])->default('unpaid');
            $table->bigInteger('price');
            $table->integer('code')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('level_id');
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
        Schema::dropIfExists('spp_months');
    }
}
