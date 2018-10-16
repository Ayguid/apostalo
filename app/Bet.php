<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
  protected $table = 'bets';

  protected $fillable = [
    'event_id', 'ref_who_table_id', 'ref_bet_type_id', 'result', 'status',
  ];

}
