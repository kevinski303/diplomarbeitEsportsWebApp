<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aea2c1786bf4RelationshipsToPlayoffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('playoffs', function(Blueprint $table) {
            if (!Schema::hasColumn('playoffs', 'playofftournament_id')) {
                $table->integer('playofftournament_id')->unsigned()->nullable();
                $table->foreign('playofftournament_id', '153046_5aea2c14b07b3')->references('id')->on('tournaments')->onDelete('cascade');
                }
                if (!Schema::hasColumn('playoffs', 'seasontournament_id')) {
                $table->integer('seasontournament_id')->unsigned()->nullable();
                $table->foreign('seasontournament_id', '153046_5aea2c14bbe44')->references('id')->on('tournaments')->onDelete('cascade');
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
        Schema::table('playoffs', function(Blueprint $table) {
            
        });
    }
}
