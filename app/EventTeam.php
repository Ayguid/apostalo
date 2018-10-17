<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;


class EventTeam extends Model
{
  protected $table = 'event_teams';

protected $fillable = [
 'team_id', 'player_id', 'event_id',
];


public function teams()
{
  return $this->hasOne(Team::class, 'id');
}



}
