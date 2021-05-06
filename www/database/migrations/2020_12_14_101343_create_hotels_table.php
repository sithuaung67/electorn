<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('hotel_id');
            $table->string('hotel_name')->length(150)->nullable();
            $table->text('address_mm')->nullable();
            $table->text('address_en')->nullable();
            $table->text('contact_info_mm')->nullable();
            $table->text('contact_info_en')->nullable();
            $table->string('hotel_rating')->length(10)->nullable();
            $table->text('policy_mm')->nullable();
            $table->text('policy_en')->nullable();
            $table->text('note_mm')->nullable();
            $table->text('note_en')->nullable();
            $table->string('country_name')->length(100)->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('state_name')->length(30)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('township')->length(30)->nullable();
            $table->integer('price_type')->length(10)->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
