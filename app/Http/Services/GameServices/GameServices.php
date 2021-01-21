<?php

namespace App\Http\Services\GameServices;

use App\Exceptions\ArtificialException;
use App\Http\Repositories\GameRepository\GameRepository;
use App\Traits\ResponseApi;

class GameServices {


	use ResponseApi;

	private $gameRepository;

	const GOTTEN_ALL_GAMES = 'All games gotten successfully';

	const GOTTEN_ALL_GAMES_PLAYERS_GAMEPLAYED = 'All the players, their games and their gameplays';

	const GOTTEN_GAME_PLAYED_PER_DAY = 'Game Played per day successfully retrieved';

	const GOTTEN_GAME_PLAYED_RANGE = 'Games played successfully retrieved';

	const GOTTEN_TOP_100_PLAYERS = 'Top Players successfully retrieved';

	public function __construct(GameRepository $gameRepository){

		$this->gameRepository = $gameRepository;
	}

	public function get_all_games(){

		$get_all_games = $this->gameRepository->get_all_games();

			if(!$get_all_games){

				 throw new ArtificialException('No game added to the system');
			}

		return ResponseApi::successResponse($get_all_games, self::GOTTEN_ALL_GAMES, ResponseApi::$code200);

	}

	public function get_all_players_game_play(){

		$get_game_played_results = $this->gameRepository->get_all_players_game_play();

			if(!$get_game_played_results){

				 throw new ArtificialException('Data not found');
			}

		return ResponseApi::successResponse($get_game_played_results, self::GOTTEN_ALL_GAMES_PLAYERS_GAMEPLAYED, ResponseApi::$code200);
	}

	public function game_played_per_day(){

		$get_played = $this->gameRepository->game_played_per_day();

		if(!$get_played){

				 throw new ArtificialException('Data not found');
			}

		return ResponseApi::successResponse($get_played, self::GOTTEN_GAME_PLAYED_PER_DAY, ResponseApi::$code200);

	}

	public function get_game_played_per_date_range($request){

		$result_date_range = $this->gameRepository->get_game_played_per_date_range($request['date_from'],$request['date_to']);

		if(!$result_date_range){

				 throw new ArtificialException('Data not found');

		}

		return ResponseApi::successResponse($result_date_range, self::GOTTEN_GAME_PLAYED_RANGE, ResponseApi::$code200);

	}

	public function return_top_100_players(){

		$return_top_100_players_result = $this->gameRepository->return_top_100_players();

		if(!$return_top_100_players_result){

				 throw new ArtificialException('Data not found');

		}

		return ResponseApi::successResponse($return_top_100_players_result, self::GOTTEN_TOP_100_PLAYERS, ResponseApi::$code200);

	}


}

