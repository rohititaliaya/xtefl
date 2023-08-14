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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('category_slug')->nullable();
            $table->string('subcat_slug')->nullable();
            $table->string('country_slug')->nullable();
            $table->string('city_slug')->nullable();
            $table->string('timing_slug')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->text('meta')->nullable();
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
        Schema::dropIfExists('urls');
    }
};
