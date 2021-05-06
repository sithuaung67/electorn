<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_booking_customers', function (Blueprint $table) {
            $table->bigIncrements('hotel_booking_customer_id');
            $table->string('hotel_booking_id')->length(30)->nullable()->default(0);
            $table->string('full_name')->length(100)->nullable();
            $table->string('nationality')->length(30)->nullable()->default(0);
            $table->string('nrc')->length(50)->nullable();
            $table->string('nrc_front_img')->nullable();
            $table->string('nrc_back_img')->nullable();
            $table->string('passport_number')->length(30)->nullable();
            $table->string('passport_front_img')->nullable();
            $table->string('gmail')->length(50)->nullable();
            $table->string('phone')->length(30)->nullable();
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
        Schema::dropIfExists('hotel_booking_customers');
    }
}
