<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\SportCategory;
use App\Sport;



class Competition extends Model
{



  //
    protected $table = 'competitions';

  protected $fillable = [
    'description', 'sport_id', 'sport_category_id',
  ];


public function events()
{
  return $this->hasMany(Event::class);
}


public function sportCategory()
{
  return $this->hasOne(SportCategory::class, 'id', 'sport_category_id');
}


public function sport()
{
    return $this->hasManyThrough(Sport::class, SportCategory::class, 'sport_id', 'id', 'sport_id', 'sport_id');
}


}
