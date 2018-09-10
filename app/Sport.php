<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;


class Sport extends Model
{
  protected $fillable = [
    'sport_description',
  ];





  //relations
  public function events()
  {
    return $this->hasMany(Event::class, 'id');
  }
























}
