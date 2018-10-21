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



        @isset($data['sport'])



          <h3>{{$data['sport']->description}}</h3>
        @endisset




        @isset($data['category'])
          <h4>{{$data['category']->description}}</h4>
        @endisset





        @isset($data['competitions'])
          <ul>
            @foreach ($data['competitions'] as $competition)
              <li>{{$competition->description}}</li>
            @endforeach
          </ul>
        @endisset


        <form class="" action="{{route('storeCompetition')}}" method="post">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="description">Ingresar Competencia</label>
              <input type="text" class="form-control" placeholder="Ingresar Competencia" name="description" value="" required>
              <input hidden type="number" name="sport_id" value="{{$data['sport']->id}}" required>
              <input hidden type="number" name="sport_category_id" value="{{$data['category']->id}}" required>
            </div>
          </div>



        <br>
          <div class="form-row">
            <button class="btn btn-primary" type="submit">Agregar Competencia</button>
          </div>


        </form>





      </div>
    </div>
  </div>



@endsection
