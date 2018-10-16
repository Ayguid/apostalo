<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;

class SportController extends Controller
{
    public function index()
    {
      $sports=Sport::all();
      return $sports;
    }
}
