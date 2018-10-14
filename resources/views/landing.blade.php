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
  <apostalofeed-component></apostalofeed-component>
{{-- <passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens> --}}
</div>




@endsection
