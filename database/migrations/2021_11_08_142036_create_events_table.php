<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("content")->nullable();
            $table->text("content2")->nullable();
            $table->string("image")->nullable();
            $table->timestamp("event_start_date");
            $table->timestamp("event_end_date")->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('max_amount_tickets');
            $table->integer('max_amount_tickets_per_person');
            $table->string("location");
            $table->decimal("price");
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
        Schema::dropIfExists('events');
    }
}
