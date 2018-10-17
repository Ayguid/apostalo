<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventTeam;



class Bet extends Model
{
  protected $table = 'bets';

  protected $fillable = [
    'event_id', 'description', 'team_id', 'player_id', 'payout', 'status', 'result',
  ];





public function team()
{
  return $this->hasOne(Team::class,'id', 'team_id');
}



}
