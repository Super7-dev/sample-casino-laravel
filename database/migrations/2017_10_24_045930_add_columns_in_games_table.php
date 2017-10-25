<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            // $table->string('gameName')->default('');    
            $table->string('gameDescription')->default('');
            $table->string('gameImageUrl')->default('');
            $table->string('gameBackgroundImageUrl')->default('');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('gameName');    
            $table->dropColumn('gameDescription');
            $table->dropColumn('gameImageUrl');
            $table->dropColumn('gameBackgroundImageUrl');    
        });
    }
}
