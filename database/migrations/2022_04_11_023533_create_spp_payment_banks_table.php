<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppPaymentBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_payment_banks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('spp_month_id');
            $table->integer('bank_id');
            $table->integer('account_number');
            $table->string('bank_type');
            $table->dateTime('date');
            $table->integer('amount');
            $table->string('description');
            $table->string('type');
            $table->integer('balance');
            $table->string('code');
            $table->string('recipient_name');
            $table->string('send_name');
            
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
        Schema::dropIfExists('spp_payment_banks');
    }
}
