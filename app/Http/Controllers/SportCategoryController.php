<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SportCategory;

class SportCategoryController extends Controller
{



public function index()
{
    $sportCategories=SportCategory::with('sport')->get();

}












}
