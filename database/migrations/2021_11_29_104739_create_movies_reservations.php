<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('halls_has_movies_id')->unsigned();
            $table->foreign('halls_has_movies_id')->references('id')->on('halls_has_movies')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer("x");
            $table->integer("y");
            $table->boolean("locked");
            $table->string('zipcode');
            $table->string('address');
            $table->string('city');
            $table->string('house_number');
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
        Schema::dropIfExists('movies_reservations');
    }
}
