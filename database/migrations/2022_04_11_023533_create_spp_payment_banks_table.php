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

            $table->foreignId('student_id');
            $table->string('bank_id');
            $table->string('account_number');
            $table->string('bank_type');
            $table->dateTime('date');
            $table->integer('amount');
            $table->string('description');
            $table->string('type');
            $table->integer('balance');
            $table->string('code');
            $table->string('recipient_name')->nullable();
            $table->string('send_name')->nullable();

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
