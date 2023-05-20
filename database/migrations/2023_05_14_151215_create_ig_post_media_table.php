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
        Schema::create('ig_post_media', function (Blueprint $table) {
            $table->id();
            $table->string('media_file', 255);
            $table->string('position', 255);
            $table->timestamps();
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('ig_post');
            $table->unsignedBigInteger('filter_id');
            $table->foreign('filter_id')->references('id')->on('ig_filter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ig_post_media');
    }
};
