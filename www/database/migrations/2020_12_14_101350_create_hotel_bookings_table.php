<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel_booking_id')->length(30)->nullable()->default(0);
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_name')->length(50)->nullable();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('hotel_name')->length(255)->nullable();
            $table->string('hotel_rating')->length(255)->nullable();
            $table->text('address_mm')->nullable();
            $table->text('address_en')->nullable();
            $table->datetime('check_in')->nullable();
            $table->datetime('check_out')->nullable();
            $table->integer('price_type')->nullable()->default(0);
            $table->bigInteger('total_price')->nullable()->default(0);
            $table->unsignedBigInteger('room_id')->unllable();
            $table->string('room_type')->length(100)->nullable();
            $table->string('room_view')->length(100)->nullable();
            $table->bigInteger('room_price_local')->nullable()->default(0);
            $table->bigInteger('room_price_foreign')->nullable()->default(0);
            $table->bigInteger('extra_price_local')->nullable()->default(0);
            $table->bigInteger('extra_price_foreign')->nullable()->default(0);
            $table->bigInteger('room_qty')->nullable()->default(0);
            $table->bigInteger('extra_qty')->nullable()->default(0);
            $table->integer('room_count')->nullable()->default(0);
            $table->integer('extra_count')->nullable()->default(0);
            $table->integer('day_count')->nullable()->default(0);
            $table->bigInteger('total_room_price')->nullable()->default(0);
            $table->unsignedBigInteger('booking_status_id')->nullable()->default(1);
            $table->string('booking_status_name')->length(20)->nullable();
            $table->string('room_img')->nullable();
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
        Schema::dropIfExists('hotel_bookings');
    }
}
