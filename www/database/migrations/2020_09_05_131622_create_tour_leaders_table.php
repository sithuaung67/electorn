<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_leaders', function (Blueprint $table) {
            $table->bigIncrements('tour_leader_id');
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('image')->nullable();
            $table->string('tour_user_name')->nullable();
            $table->string('fcm_token')->nullable();
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
        Schema::dropIfExists('tour_leaders');
    }
}
