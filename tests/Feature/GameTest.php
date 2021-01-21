<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected $baseEndpoint = "api/games/";

    public function testShouldReturnAllGames()
    {
        $response = $this->json('GET', $this->baseEndpoint."get_all_games");

        $response->assertStatus(200);

        return json_decode($response->getContent())->data;
 
    }

    public function testShouldReturnGamesAndGamesPlayed(){

        $response = $this->json('GET', $this->baseEndpoint."get_played");

        $response->assertStatus(200);

        return json_decode($response->getContent())->data;
    }

    public function testShouldReturnGamePlayedPerDay(){

        $response = $this->json('GET', $this->baseEndpoint."game_played_per_day");

        $response->assertStatus(200);

        return json_decode($response->getContent())->data;

    }

    public function testShouldReturnGamePlayedRange(){

        $response = $this->json('GET', $this->baseEndpoint."game_played_range");

        $response->assertStatus(200);

        return json_decode($response->getContent())->data;

    }

    public function testShouldReturnTop100Players(){

        $response = $this->json('GET', $this->baseEndpoint."return_top_100_players");

        $response->assertStatus(200);

        return json_decode($response->getContent())->data;

    }

   
}
