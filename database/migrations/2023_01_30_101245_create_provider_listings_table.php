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
        Schema::create('provider_listings', function (Blueprint $table) {
            $table->id();
            
            $table->string('reference_id');

            $table->string('basic_category')->nullable();
            $table->string('title');
            $table->string('image');
            $table->string('listing_url');

            $table->string('promoted_category')->nullable();
            $table->string('promoted_title')->nullable();
            $table->string('promoted_desc')->nullable();
            $table->string('promoted_img')->nullable();
            $table->string('promoted_banner')->nullable();

            $table->string('video')->nullable();
            $table->string('video_title')->nullable();
            
            $table->enum('status',['0','1','2'])->default('0');
            
            $table->integer('amount')->nullable();
            $table->integer('provider_id')->nullable();

            $table->string('startdate')->nullable();
            $table->string('enddate')->nullable();
            $table->enum('is_promoted',['0','1','2'])->default(0);
            $table->integer('months')->default(0);
            $table->enum('payment_status',['success','failed','pending'])->nullable();
            $table->string('transaction_id')->nullable();

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
        Schema::dropIfExists('provider_listings');
    }
};
