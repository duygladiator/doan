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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price')->default(10000);
            $table->integer('discount_price')->default(5000);
            $table->tinyText('short_description');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('status')->default(0);
            $table->string('slug')->nullable();
            $table->string('quantity')->nullable();
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            //index cot hay dung`
            $table->index(['name', 'price']);
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
        Schema::dropIfExists('products');
    }
};