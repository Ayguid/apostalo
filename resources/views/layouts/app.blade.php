<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Fonts -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('styles/apostalo.css') }}" rel="stylesheet">
</head>


<body>

<div id="app" class="">


  <nav class="header">
    <div class="logo">
      <a href="{{url('/')}}"><img width="100%;" src="{{asset('img/apostalo.png')}}" alt=""></a>
    </div>

    <div class="navigation-bar">
      <div class="navigation-bar-buttons">
        @guest
          <ul>
            <li class="">
              <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="">
              <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          </ul>
        @else
          <ul>
            <li>
              <a  href="{{route('home')}}" >
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
            </li>
            <li>
              <a class="" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('user.logout') }}" method="post" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      @endguest
    </div>
  </div>
</nav>









<main  class="main-container">
  @yield('content')
</main>







<div class="footer">
  @include('components.footer')
</div>

</div>

<script type="text/javascript" src="{{asset('js/carousel.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
  //loading giff jquery
	$(window).load(function() {
		$(".se-pre-con").fadeOut("fast");
		// $(".se-pre-con").fadeOut("slow");
	});
</script>
</body>
</html>
