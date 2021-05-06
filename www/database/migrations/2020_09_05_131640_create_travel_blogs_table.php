<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_blogs', function (Blueprint $table) {
            $table->bigIncrements('travel_blog_id');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string('travel_blog_name_mm')->nullable();
            $table->string('travel_blog_name_en')->nullable();
            $table->text('description_mm')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('travel_blogs');
    }
}
