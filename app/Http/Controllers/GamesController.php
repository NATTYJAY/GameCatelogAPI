<?php

namespace App\Http\Controllers;

use App\Http\Services\GameServices\GameServices;
use Illuminate\Http\Request;

class GamesController extends Controller
{


	protected $gameServices;
	
	public function __construct(GameServices $gameServices){

		$this->gameServices = $gameServices;
	}

	public function get_all_games(){

		$game_result = $this->gameServices->get_all_games();

		return $game_result;
	}

	public function get_players_games_game_play(){

		$result = $this->gameServices->get_all_players_game_play();

		return $result;
	}

	public function game_played_per_day(){

		$result_data = $this->gameServices->game_played_per_day();

		return $result_data;
	}

	public function get_game_played_per_date_range(Request $request){

		$result_range = $this->gameServices->get_game_played_per_date_range($request);

		return $result_range;
	}

	public function return_top_100_players(){

		$result_top = $this->gameServices->return_top_100_players();

		return $result_top;

	}


}
