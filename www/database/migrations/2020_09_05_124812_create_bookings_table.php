<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_name')->nullable();
            $table->unsignedBigInteger('package_id');
            $table->string('package_name')->nullable();
            $table->string('tour_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('total_price')->nullable();
            $table->string('twin_share_romm_price')->nullable();
            $table->string('single_room_price')->nullable();
            $table->string('extra_bed_price')->nullable();
            $table->string('without_extra_bed_price')->nullable();
            $table->string('qty_men')->nullable();
            $table->string('qty_child')->nullable();
            $table->unsignedBigInteger('booking_status_id')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
