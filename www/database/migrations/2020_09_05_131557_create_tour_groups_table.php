<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_groups', function (Blueprint $table) {
            $table->bigIncrements('tour_group_id');
            $table->unsignedBigInteger('tour_leader_id');
            $table->unsignedBigInteger('package_id');
            
            $table->foreign('package_id')
                ->references('package_id')->on('packages')
                ->onDelete('cascade');
            
            $table->foreign('tour_leader_id')
                ->references('tour_leader_id')->on('tour_leaders')
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
        Schema::dropIfExists('tour_groups');
    }
}
