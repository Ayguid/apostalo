<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Sport;
use App\Competition;
use App\SportCategory;

class SportController extends Controller
{





  public function index()
  {
    $sports=Sport::all();
    return $sports;
  }



  public function showSports ()
  {
    return view('vendor.adminlte.sports');
  }


  public function sportCategories($id)
  {
    $sCategory = SportCategory::where('sport_id', $id)->get();
    return $sCategory;
  }








  public function store(Request $request)
  {
    $validatedData = Validator::make($request->all(), [
      'description' => 'required|max:255',
    ]);

    if ($validatedData->fails())
    { $request->session()->flash('alert-danger', 'There was a problem adding your sport!');
      return redirect(route('sports'))->withInput()->withErrors($validatedData->errors());
    }
    else{
      $sport = new Sport();
      $sport->description = $request->description;
      $save=$sport->save();
      if ($save) {
        $request->session()->flash('alert-success', 'Sport Saved!');
        return redirect(route('sports'));
      }else{
        $request->session()->flash('alert-danger', 'There was a problem adding your sport!');
        return redirect(route('sports'))->withInput()->withErrors($validatedData->errors());
      }
    }


  }
















}
