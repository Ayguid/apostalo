@extends('adminlte::page')

@section('content')

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))

    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong>  {{$errors}}</div>
  @endif

  <div class="card">
    <div class="card-header">Seccion Deportes</div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif


      <form class="" action="{{route('storeSport')}}" method="post">
        {{ csrf_field() }}

        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="description">Ingresar Deporte</label>
            <input type="text" class="form-control" placeholder="Ingresar Deporte" name="description" value="" required>
          </div>
        </div>

<br>
        <div class="form-row">
          <button class="btn btn-primary" type="submit">Agregar Deporte</button>
        </div>


      </form>


<ul class="adminSports">


@foreach (App\Sport::all() as $sport)

  

  <li>{{$sport->description}}</li>
@endforeach
</ul>



    </div>
  </div>



@endsection
