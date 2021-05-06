<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('package_id');
            $table->string('tour_code')->nullable();
            $table->string('package_name_mm')->nullable();
            $table->string('package_name_en')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('duration_mm')->nullable();
            $table->string('duration_en')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_mm')->nullable();
            $table->string('direction_mm')->nullable();
            $table->string('direction_en')->nullable();
            $table->text('description_en')->nullable();
            $table->string('description_mm')->nullable();
            $table->string('itinerary_mm')->longtext();
            $table->string('itinerary_en')->longtext();
            $table->string('stock')->nullable();
            $table->string('twin_share_room_price')->nullable();
            $table->string('single_room_price')->nullable();
            $table->string('extra_bed_price')->nullable();
            $table->string('without_extra_bed_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('is_discount')->nullable()->default(0);
            $table->string('portrait_image')->nullable();
            $table->string('status')->nullable()->default('0');
            $table->string('pin')->nullable()->default('0');
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
        Schema::dropIfExists('packages');
    }
}
