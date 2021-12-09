<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_reservations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restaurant_id')->unsigned()->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->time("time")->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('restaurant_reservations');
    }
}
