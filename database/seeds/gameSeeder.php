<?php

use App\Models\Games;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Data to generate 5 games (Call of Duty, Mortal Kombat, FIFA, Just Cause, Apex Legend) with different versions from 2010 to 2020.
    	   $faker = Faker::create();

		    	$array = [
		    		
						    [
						    	'name' => "Call of Duty", 
						    	'version' => '2010'
						    ],

						    [	
						    	'name' => "Mortal Kombat",
						    	'version' => '2013'
						    ],

						    [
						    	'name' => "FIFA", 
						    	"version" => '2016'
						    ],

						    [
						    	'name' => "Just Cause",
						    	"version" => '2019'
						    ],

						    [
						    	'name' => "Apex Legend", 
						    	'version' => '2017'
						    ],
				];

				foreach ($array as $key => $value) {

		    		$games= Games::create([

	            		'name' => $value['name'],

	            		'version' => $value['version'],

	            		'date_added' => $faker->date

	       			]);
				}
    }
}
