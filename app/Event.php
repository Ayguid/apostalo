<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sport;
use App\Available_Bid;
use App\Competition;
use App\Team;
use App\EventTeam;
use App\Bet;

class Event extends Model
{
    //


    protected $table = 'events';

    protected $fillable = [
      'ref_stadium', 'instance', 'sport_id', 'competition_id', 'date',
    ];







//relations
public function sport()
{
  return $this->hasOne(Sport::class, 'id', 'sport_id');
}




public function availableBids()
{
  return $this->hasMany(Available_Bid::class);
}



public function competition()
{
  return $this->hasOne(Competition::class, 'id', 'competition_id');
}


public function teams()
{
  return $this->hasManyThrough(Team::class, EventTeam::class, 'event_id', 'id', 'id', 'team_id');
}

public function bets()
{
  return $this->hasMany(Bet::class);
}

}
