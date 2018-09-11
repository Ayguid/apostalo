@extends('layouts.app')

@section('content')



  <div class="">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
  </div>




{{--  start carousell--}}
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
{{-- end carousell  --}}




<div id="below-carousel" class="below-carousel">


 <div class="below-carousel-item" v-for='event in events'>
   @{{ event.instance }}<br>
   @{{ event.sports[0].sport_description }}
   <img  src="{{asset('img/ranking-home.png')}}" alt="">
 </div>


</div>



<script src="{{ asset('js/events.js') }}" defer></script>
@endsection
