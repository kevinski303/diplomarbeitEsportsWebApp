<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea2ab65eeb5RelationshipsToGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function(Blueprint $table) {
            if (!Schema::hasColumn('games', 'tournament_id')) {
                $table->integer('tournament_id')->unsigned()->nullable();
                $table->foreign('tournament_id', '153044_5aea2ab362885')->references('id')->on('tournaments')->onDelete('cascade');
                }
                if (!Schema::hasColumn('games', 'team1_id')) {
                $table->integer('team1_id')->unsigned()->nullable();
                $table->foreign('team1_id', '153044_5aea2ab36dd2c')->references('id')->on('teams')->onDelete('cascade');
                }
                if (!Schema::hasColumn('games', 'team2_id')) {
                $table->integer('team2_id')->unsigned()->nullable();
                $table->foreign('team2_id', '153044_5aea2ab3795e3')->references('id')->on('teams')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function(Blueprint $table) {
            
        });
    }
}
