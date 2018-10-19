<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */








    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = Validator::make($request->all(), [
        'description' => 'required|max:255',
          ]);

      if ($validatedData->fails())
      { $request->session()->flash('alert-danger', 'There was a problem adding your Competition!');
        return redirect(route('competitionsForm'))->withInput()->withErrors($validatedData->errors());
      }
      else{
        $competition = new Competition();
        $competition->description = $request->description;
        $competition->sport_id = $request->sport_id;
        $competition->sport_category_id = $request->sport_category_id;
        $save=$competition->save();
        if ($save) {
          $request->session()->flash('alert-success', 'Competition Saved!');
            return redirect(route('competitionsForm'));
        }else{
          $request->session()->flash('alert-danger', 'There was a problem adding your Competition!');
            return redirect(route('competitionsForm'))->withInput()->withErrors($validatedData->errors());
        }
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
