<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_score_history', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('gameweek_1')->nullable();
            $table->integer('gameweek_2')->nullable();
            $table->integer('gameweek_3')->nullable();
            $table->integer('gameweek_4')->nullable();
            $table->integer('gameweek_5')->nullable();
            $table->integer('gameweek_6')->nullable();
            $table->integer('gameweek_7')->nullable();
            $table->integer('gameweek_8')->nullable();
            $table->integer('gameweek_9')->nullable();
            $table->integer('gameweek_10')->nullable();
            $table->integer('gameweek_11')->nullable();
            $table->integer('gameweek_12')->nullable();
            $table->integer('gameweek_13')->nullable();
            $table->integer('gameweek_14')->nullable();
            $table->integer('gameweek_15')->nullable();
            $table->integer('gameweek_16')->nullable();
            $table->integer('gameweek_17')->nullable();
            $table->integer('gameweek_18')->nullable();
            $table->integer('gameweek_19')->nullable();
            $table->integer('gameweek_20')->nullable();
            $table->integer('gameweek_21')->nullable();
            $table->integer('gameweek_22')->nullable();
            $table->integer('gameweek_23')->nullable();
            $table->integer('gameweek_24')->nullable();
            $table->integer('gameweek_25')->nullable();
            $table->integer('gameweek_26')->nullable();
            $table->integer('gameweek_27')->nullable();
            $table->integer('gameweek_28')->nullable();
            $table->integer('gameweek_29')->nullable();
            $table->integer('gameweek_30')->nullable();
            $table->integer('gameweek_31')->nullable();
            $table->integer('gameweek_32')->nullable();
            $table->integer('gameweek_33')->nullable();
            $table->integer('gameweek_34')->nullable();
            $table->integer('gameweek_35')->nullable();
            $table->integer('gameweek_36')->nullable();
            $table->integer('gameweek_37')->nullable();
            $table->integer('gameweek_38')->nullable();        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
