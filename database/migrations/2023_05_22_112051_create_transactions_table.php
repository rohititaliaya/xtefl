<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table)
        {
            $table->id();
            $table->integer('user_id');
            $table->string('email');
            $table->string('payment_gateway')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('response')->nullable();
            $table->integer('status')->default(0);
            $table->dateTime('expiry_date')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status', 'expiry_date', 'transaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
