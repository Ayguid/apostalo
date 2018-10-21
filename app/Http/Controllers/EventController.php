<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\EventTeam;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = false)
    {

    if ($filter == false) {
      $events=Event::with('sport', 'competition.sportCategory', 'teams', 'bets.team')->orderBy('id', 'desc')->get();
      return $events;
    }
    else{
      $events=Event::where('sport_id', $filter)->with('sport', 'competition.sportCategory', 'teams', 'bets.team')->orderBy('id', 'desc')->get();
      return $events;
    }

    }



    public function adminShowEvents($sport = null)
    {
      $events = Event::all();
      if ($sport == false) {
        $events=Event::with('sport', 'competition.sportCategory', 'teams', 'bets.team')->orderBy('id', 'desc')->get();
        return view('vendor.adminlte.events')->with('events', $events);
      }
      else{
        $events=Event::where('sport_id', $sport)->with('sport', 'competition.sportCategory', 'teams', 'bets.team')->orderBy('id', 'desc')->get();
        return view('vendor.adminlte.events')->with('events', $events);
      }

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
        'sport' => 'required|max:255',
        'competition' => 'required|max:255',
        'date' => 'required|max:255',
          ]);

      if ($validatedData->fails())
      { $request->session()->flash('alert-danger', 'There was a problem adding your Event!');
        return redirect(route('adminShowEvents'))->withInput()->withErrors($validatedData->errors());
      }
      else{
        $event = new Event();
        $event->description = $request->description;
        $event->sport_id = $request->sport;
        $event->competition_id = $request->competition;
        $save=$event->save();

        foreach ($request->teams as $team) {
          $eventTeam = new EventTeam();
          $eventTeam ->team_id= $team;
          $eventTeam->event_id =$event->id;
          $eventTeam->save();
        }

        if ($save) {
          $request->session()->flash('alert-success', 'Event Saved!');
            return redirect(route('adminShowEvents'));
        }else{
          $request->session()->flash('alert-danger', 'There was a problem adding your Event!');
            return redirect(route('adminShowEvents'))->withInput()->withErrors($validatedData->errors());
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
