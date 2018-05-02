<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea2d6cc58c5RelationshipsToTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function(Blueprint $table) {
            if (!Schema::hasColumn('tournaments', 'tournamentmode_id')) {
                $table->integer('tournamentmode_id')->unsigned()->nullable();
                $table->foreign('tournamentmode_id', '153039_5aea2d69648fe')->references('id')->on('modes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('tournaments', 'winner_id')) {
                $table->integer('winner_id')->unsigned()->nullable();
                $table->foreign('winner_id', '153039_5aea2d696e8ae')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('tournaments', function(Blueprint $table) {
            
        });
    }
}
