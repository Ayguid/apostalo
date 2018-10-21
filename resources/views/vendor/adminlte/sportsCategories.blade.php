@extends('adminlte::page')

@section('content')

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))

    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong>  {{$errors}}</div>
  @endif

  <div class="card">
    <h3>Seccion Divisiones</h3>
    <div class="card-header">Seleccione un Deporte</div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
<br>
<div class="panel-group" id="accordion">

@foreach (App\Sport::all() as $sport)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$sport->id}}">{{$sport->description}}</a>
      </h4>
    </div>
    <div id="collapse{{$sport->id}}" class="panel-collapse collapse">
      <div class="panel-body">

<h3>Deporte:  {{$sport->description}}</h3>
{{-- {{dd($sport->competitions)}} --}}
<h4>Divisiones</h4>

<ul class="list-group">

  @foreach ($sport->sportCategories as $sportCategory)

    <li class="list-group-item">{{$sportCategory->description}}&nbsp; <a href="{{route('showCompetitions',[ $sportCategory->sport_id, $sportCategory->id])}}">Competencias</a></li>

  @endforeach

</ul>

<a class="" data-toggle="collapse" href="#divisionForm{{$sport->id}}" role="button" aria-expanded="false" aria-controls="divisionForm">
  <i class="fa fa-plus"></i> Agregar Division
</a>
<div class="collapse" id="divisionForm{{$sport->id}}">

<form class="" action="{{route('storeSportCategory')}}" method="post">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="description">Ingresar Division</label>
      <input type="text" class="form-control" placeholder="Ingresar Division" name="description" value="" required>
      <input hidden type="number" name="sport_id" value="{{$sport->id}}" required>
    </div>
  </div>



<br>
  <div class="form-row">
    <button class="btn btn-primary" type="submit">Agregar Division</button>
  </div>


</form>
</div>

</div>
</div>
</div>

@endforeach






    </div>
  </div>
  </div>



@endsection
