<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->bigIncrements('join_id');
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('package_id');

            $table->foreign('package_id')
                ->references('package_id')->on('packages')
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
        Schema::dropIfExists('joins');
    }
}
