<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::group(['prefix' => 'games/'], function () {

       Route::get('get_all_games', 'GamesController@get_all_games')->where('name', '[A-Za-z]+');

       Route::get('get_player_game_played', 'GamesController@get_players_games_game_play');

       Route::get('game_played_per_day', 'GamesController@game_played_per_day');

       Route::get('game_played_range', 'GamesController@get_game_played_per_date_range');

       Route::get('return_top_100_players', 'GamesController@return_top_100_players');

    });
