<?php

use App\Models\Games;
use App\Models\GamesPlayed;
use App\Models\Players;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GamesPlayedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          $faker = Faker::create();

          // 3,835

		    for ($i = 0; $i < 1500; $i++) {

				  $game_id = Games::inRandomOrder()->first()->id;

		          $game_date = Games::inRandomOrder()->first()->date_added;

		          $player_id = Players::inRandomOrder()->first()->id;

	        		 $games= GamesPlayed::create([

	            		'game_id' => $game_id,

	            		'player_id'=> $player_id,

	            		'date_played'=>  $game_date 
	            		
	       			]);
		    }
    }
}
