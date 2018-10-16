<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
  protected $table = 'event_teams';

protected $fillable = [
 'team_id', 'competition_id',
];

}
