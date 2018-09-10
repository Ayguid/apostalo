@extends('layouts.app')

@section('content')



  <div class="">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
  </div>





    <div class="slideshow-container">


      <div class="mySlides fade">
        <img src="{{asset('img/1.jpg')}}">
      </div>


      <div class="mySlides fade">
        <img src="{{asset('img/2.jpg')}}">
      </div>


      <div class="mySlides fade">
        <img src="{{asset('img/3.jpg')}}">
      </div>


    </div>

        {{-- <example-component></example-component> --}}
        {{-- {{App\Event::find(1)->sports}} --}}
        {{-- {{App\Sport::find(1)->events}} --}}


    <div class="">
    @for ($i=0; $i < 10; $i++)
      <div class="below-carousel-item ">
        {{App\Event::find(1)->sports()->first()->sport_description}}<br>
        {{App\Sport::find(1)->events()->first()->instance}}<br>
        <img  src="{{asset('img/ranking-home.png')}}" alt="">
      </div>
    @endfor
    </div>







@endsection
