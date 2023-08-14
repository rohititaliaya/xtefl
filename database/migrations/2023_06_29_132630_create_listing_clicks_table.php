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
        Schema::create('listing_clicks', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id');
            $table->integer('listing_id');
            $table->integer('type');
            $table->string('attribute')->default('Unknown');
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
        Schema::dropIfExists('listing_clicks');
    }
};
