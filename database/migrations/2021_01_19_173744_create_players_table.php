<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
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
            if(!Schema::hasTable('players')){
                Schema::create('players', function (Blueprint $table) {
                    $table->id();
                    $table->index(['id']);
                    $table->string('name')->nullable();
                    $table->string('email')->unique();
                    $table->string('nickname')->nullable();
                    $table->string('password')->nullable();
                    $table->string('date_joined')->nullable();
                    $table->string('last_login')->nullable();
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
        Schema::dropIfExists('players');
    }
}
