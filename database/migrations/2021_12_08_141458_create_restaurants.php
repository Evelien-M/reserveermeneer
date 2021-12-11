<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time("open_time")->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->time("close_time")->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer("amount_seats");
            $table->string("location");
            $table->string('kitchen_type');
            $table->foreign('kitchen_type')->references('type')->on('restaurant_kitchentypes')->onDelete('cascade');
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
        Schema::dropIfExists('restaurants');
    }
}
