<?php

namespace App\Models;

use App\Models\Games;
use App\Models\Players;
use Illuminate\Database\Eloquent\Model;

class GamesPlayed extends Model
{
    //
    protected $table = "games_played";

    protected $guarded = [];

    public function games(){

    	return $this->belongsTo(Games::class,'game_id');
    }

    public function players(){

    	return $this->belongsTo(Players::class,'player_id');
    }

}
