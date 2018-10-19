<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SportCategory;

class SportCategoryController extends Controller
{



public function index()
{
    $sportCategories=SportCategory::with('sport')->get();

}






public function store(Request $request)
{
  $validatedData = Validator::make($request->all(), [
    'description' => 'required|max:255',
      ]);

  if ($validatedData->fails())
  { $request->session()->flash('alert-danger', 'There was a problem adding your sport category!');
    return redirect(route('sportsCategories'))->withInput()->withErrors($validatedData->errors());
  }
  else{
    $sportCategory = new SportCategory();
    $sportCategory->description = $request->description;
    $sportCategory->sport_id = $request->sport_id;
    $save=$sportCategory->save();
    if ($save) {
      $request->session()->flash('alert-success', 'Sport Category Saved!');
        return redirect(route('sportsCategories'));
    }else{
      $request->session()->flash('alert-danger', 'There was a problem adding your sport category!');
        return redirect(route('sportsCategories'))->withInput()->withErrors($validatedData->errors());
    }
  }







}
}
