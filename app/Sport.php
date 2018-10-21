<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\SportCategory;
use App\Sport;

class Sport extends Model
{
    protected $table = 'sports';

  protected $fillable = [
    'description',
  ];





  //relations
  public function events()
  {
    return $this->hasMany(Event::class, 'id');
  }


public function sportCategories()
{
    return $this->hasMany(SportCategory::class);
}


















}
