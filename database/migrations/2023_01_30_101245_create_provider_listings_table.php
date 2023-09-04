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
            $table->integer('provider_id')->nullable();
            
            $table->string('reference_id');
            $table->string('campaign');
            $table->string('target_url');
            $table->string('utm');
            
            $table->string('recomm_title');
            $table->string('recomm_image');
            $table->string('recomm_url');

            $table->enum('same_as',['1','0'])->default('0');

            $table->string('popular_title');
            $table->string('popular_image');
            $table->string('popular_url');

            $table->string('featured_title');
            $table->string('featured_image');
            $table->string('featured_url');
 
            $table->string('org_description')->nullable();
            $table->string('org_image')->nullable();
            $table->string('org_url')->nullable();

            $table->string('video_description')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('video_url')->nullable();
            
            $table->enum('status',['0','1','2'])->default('0');
            
            $table->integer('amount')->nullable();

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
