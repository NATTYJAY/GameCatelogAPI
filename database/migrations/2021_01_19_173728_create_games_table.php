<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::beginTransaction();
        try{
            if(!Schema::hasTable('games')){
                Schema::create('games', function (Blueprint $table) {
                    $table->id();
                    $table->index(['id']);
                    $table->string('name');
                    $table->string('version')->unique();
                    $table->timestamps();
                });
            }
        }catch (Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
