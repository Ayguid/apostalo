<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\SportCategory;


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
  return $this->hasOne(SportCategory::class, 'id');
}


}
