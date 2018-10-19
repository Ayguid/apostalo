<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Image;
use App\Competition;


class AdminController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin');
  }


  public function showSports()
  {
    return view('vendor.adminlte.sportsForm');
  }

public function showSportsForm ()
{
  return view('vendor.adminlte.sportsForm');
}

public function showSportsCategories()
{
  return view('vendor.adminlte.sportsCategories');
}


public function showCompetitionsForm ()
{
  return view('vendor.adminlte.competitionsForm');
}

public function showEventsForm()
{
  return view('vendor.adminlte.eventsForm');
}



}
