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
        Schema::create('listing_impressions', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id');
            $table->integer('listing_id');
            $table->string('type    ');
            $table->string('ip')->nullable();
            $table->string('device');
            $table->string('country');
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
        Schema::dropIfExists('listing_impressions');
    }
};
