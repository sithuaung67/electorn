<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_destinations', function (Blueprint $table) {
            $table->bigIncrements('blog_destination_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('travel_blog_id');

            $table->foreign('travel_blog_id')
                ->references('travel_blog_id')->on('travel_blogs')
                ->onDelete('cascade');

            $table->foreign('destination_id')
                ->references('destination_id')->on('destinations')
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
        Schema::dropIfExists('blog_destinations');
    }
}
