<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->bigIncrements('destination_id');
            $table->string('destination_name')->nullable();
            $table->string('destination_image')->nullable();
            $table->string('popular')->nullable()->default(0);
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                  ->references('country_id')->on('countries')
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
        Schema::dropIfExists('destinations');
    }
}
