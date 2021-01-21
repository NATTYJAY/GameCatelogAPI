<?php

namespace App\Models;

use App\Models\GamesPlayed;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    //
    protected $table = "games";

    protected $guarded = [];

      public function games_played(){

    	// $this->hasMany('modal_path', 'f.key of the model_path', 'l.key');
    	return $this->hasMany(GamesPlayed::class, 'game_id', 'id');
    }

}
