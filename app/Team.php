<?php

namespace App;
use App\SportCategory;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $table = 'teams';

protected $fillable = [
  'description', 'sport_category_id', 'event_id',
];




public function sportCategory()
{
  return $this->hasOne(SportCategory::class, 'id');
}









}
