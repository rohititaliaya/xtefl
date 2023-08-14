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
        Schema::create('country_sections', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('category_id');
            $table->string('country_title');
            $table->text('country_content');
            $table->integer('country_order');

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
        Schema::dropIfExists('country_sections');
    }
};
