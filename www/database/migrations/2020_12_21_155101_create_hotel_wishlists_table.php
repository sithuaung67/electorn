<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_wishlists', function (Blueprint $table) {
            $table->bigIncrements('hotel_wishlist_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('customer_id');

            $table->foreign('hotel_id')
                ->references('hotel_id')->on('hotels')
                ->onDelete('cascade');
            
            $table->foreign('customer_id')
                ->references('customer_id')->on('customers')
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
        Schema::dropIfExists('hotel_wishlists');
    }
}
