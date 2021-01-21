<?php

namespace App\Http\Repositories\GameRepository;

use App\Models\Games;
use App\Models\GamesPlayed;
use App\Models\Players;
use Illuminate\Support\Facades\DB;

class GameRepository {

	// function to return all the games

	public function get_all_games(){

		$get_all_games = Games::all();

		return $get_all_games;
	}

	// Function to return all the players, their games and their gameplays.

	public function get_all_players_game_play(){

		$result = GamesPlayed::with('games')->with('players')->get();

		return $result;

	}

	public function game_played_per_day(){

		$result_game = Players::with('games_played')->get();

		return $result_game;
	}

	public function get_game_played_per_date_range($date_from,$date_to){

		$result_query =  DB::table('games')
            ->join('games_played', 'games_played.game_id', '=', 'games.id')
            ->select(DB::raw('games.name,games.version,
                     games_played.date_played, games.id'))
            ->whereBetween('games_played.date_played', [$date_from, $date_to])
            ->orderBy('games_played.id', 'desc')->get();
            
        return $result_query;
	}

	public function return_top_100_players(){

		$result_data = Players::orderBy('date_joined','asc')->limit(100)->get();

		return $result_data;
	}

}
