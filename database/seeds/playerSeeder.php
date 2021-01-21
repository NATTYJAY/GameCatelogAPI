<?php

use App\Models\Players;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class playerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Data to generate 10,000 players in the system.

          $faker = Faker::create();

		    for ($i = 0; $i < 10000; $i++) {

	        		 $games= Players::create([

	            		'name' => $faker->name,
	            		'email'=> $faker->freeEmail,
	            		'nickname'=> $faker->word,
	            		'password'=> bcrypt('secret'),
	            		'date_joined'=> $faker->dateTime,
	            		'last_login'=>$faker->dateTime
	            		
	       			]);
		    }
    }
}
