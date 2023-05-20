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
        Schema::create('ig_user', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->require();
            $table->string('last_name', 255)->require();
            $table->string('profile_name', 255)->require();
            $table->dateTime('signup_date');

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
        Schema::dropIfExists('ig_user');
    }
};
