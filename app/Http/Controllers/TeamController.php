<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;



class TeamController extends Controller
{


public function teamsByCategory($id)
{
$response = Team::where('sport_category_id', $id)->get();
 return $response;
}




















}
