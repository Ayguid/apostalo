@extends('adminlte::page')

@section('content')

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))

    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong>  {{$errors}}</div>
  @endif

  <div class="card">
    <div class="card-header">Seccion Competencias</div>

    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
<br>
<div class="panel-group" id="accordion">

@foreach (App\Sport::all() as $sport )



    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$sport->id}}">{{$sport->description}}</a>
        </h4>
      </div>
      <div id="collapse{{$sport->id}}" class="panel-collapse collapse">
        <div class="panel-body">




        @foreach ($sport->sportCategories as $sCategory)
          <ul>
            <li>Categoria: {{$sCategory->description}}</li>
            <span><strong>Competencias:</strong> </span>
        @foreach ($sCategory->competitions as $competition)
          <ul>
            <li>{{$competition->description}}</li>

          </ul>
        @endforeach
        </ul>

        <form class="" action="{{route('storeCompetition')}}" method="post">
          {{ csrf_field() }}

          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="description">Ingresar Competencia</label>
              <input type="text" class="form-control" placeholder="Ingresar Competencia" name="description" value="" required>
              <input hidden type="number" name="sport_id" value="{{$sport->id}}" required>
              <input hidden type="number" name="sport_category_id" value="{{$sCategory->id}}" required>
            </div>
          </div>



        <br>
          <div class="form-row">
            <button class="btn btn-primary" type="submit">Agregar Competencia</button>
          </div>


        </form>
        @endforeach
        <br>



        </div>
      </div>
    </div>


@endforeach



  </div>








    </div>
  </div>



@endsection
