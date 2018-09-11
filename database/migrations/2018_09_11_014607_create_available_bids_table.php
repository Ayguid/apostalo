<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ref_bid_type')->nullable();
            $table->integer('event_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->integer('player_id')->nullable();
            $table->float('payout')->nullable();
            $table->float('')->nullable();
            // $table->foreign('sport_id')->references('id')->on('sports');
            $table->integer('competition_id')->nullable();
            $table->dateTimeTz('date')->nullable();
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
        Schema::dropIfExists('available_bids');
    }
}
