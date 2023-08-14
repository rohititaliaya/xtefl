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
        Schema::create('listing_states', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id');
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->string('country')->default('Unknown');
            $table->string('device')->default('Unknown');
            $table->string('ip')->default('Unknown');
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
        Schema::dropIfExists('listing_states');
    }
};
