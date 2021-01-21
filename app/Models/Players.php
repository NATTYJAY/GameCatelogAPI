<?php

namespace App\Models;

use App\Models\GamesPlayed;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    //
    protected $table = "players";

    protected $guarded = [];

    public function games_played(){

    	// $this->hasMany('modal_path', 'f.key of the model_path', 'l.key');
    	return $this->hasMany(GamesPlayed::class, 'player_id', 'id');
    }

}
