<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('room_id');
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('room_type')->length(100)->nullable();
            $table->string('room_view')->length(100)->nullable();
            $table->integer('room_qty')->nullable();
            $table->integer('extra_qty')->nullable();
            $table->datetime('valid_from_one')->nullable();
            $table->datetime('valid_to_one')->nullable();
            $table->bigInteger('room_price_local_one')->nullable();
            $table->bigInteger('room_price_foreign_one')->nullable();
            $table->bigInteger('extra_price_local_one')->nullable();
            $table->bigInteger('extra_price_foreign_one')->nullable();
            $table->datetime('valid_from_two')->nullable();
            $table->datetime('valid_to_two')->nullable();
            $table->bigInteger('room_price_local_two')->nullable();
            $table->bigInteger('room_price_foreign_two')->nullable();
            $table->bigInteger('extra_price_local_two')->nullable();
            $table->bigInteger('extra_price_foreign_two')->nullable();
            $table->datetime('valid_from_three')->nullable();
            $table->datetime('valid_to_three')->nullable();
            $table->bigInteger('room_price_local_three')->nullable();
            $table->bigInteger('room_price_foreign_three')->nullable();
            $table->bigInteger('extra_price_local_three')->nullable();
            $table->bigInteger('extra_price_foreign_three')->nullable();
            $table->string('room_img')->nullable();

            $table->foreign('hotel_id')
                  ->references('hotel_id')->on('hotels')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
