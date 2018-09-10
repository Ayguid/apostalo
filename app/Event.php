<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sport;



class Event extends Model
{
    //

    protected $fillable = [
      'ref_stadium', 'instance', 'sport_id', 'competition_id', 'date',
    ];







//relations
public function sports()
{
  return $this->hasMany(Sport::class, 'id');
}













}
