<?php

namespace App;
use App\Sport;

use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{

    //
      protected $table = 'sports_categories';

    protected $fillable = [
      'description', 'sport_id',
    ];


  public function sport()
  {
    return $this->hasMany(Sport::class);
  }


  public function teams()
  {
    return $this->hasMany(Team::class);
  }



}
