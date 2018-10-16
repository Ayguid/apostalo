<div class="">


@if (Auth::guard('admin')->check())

<p class="text-success">
<a href="{{route('admin.dashboard')}}">You are Logged In as a <strong>ADMIN</strong></a>
</p>

@endif




<ul class="feed_menu">
  <li><a class="" href="#">Mis Apuestas</a> </li>
  <li><a class="" href="#">Mi Saldo</a> </li>
  <li><a class="" href="#">Mis Movimientos</a> </li>
</ul>






</div>
