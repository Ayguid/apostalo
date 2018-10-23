@extends('adminlte::page')

@section('content')

  @if(Session::has('alert-success'))
    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
  @endif
  @if(Session::has('alert-danger'))

    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong>  {{$errors}}</div>
  @endif

  <div class="card">
    <div class="card-header">Seccion Eventos</div>

    <div class="card-body">

      <h3>Agregar Eventos</h3>
      <form id="eventsForm" class="" action="{{route('storeEvent')}}" method="post">
        {{ csrf_field() }}


        <div class="form-row">
          <div class="col-md-4 mb-3">

            <label for="">Seleccione un Deporte</label><br>


            <select id="sportSelect" class="select" name="sport">
              <option value="">-Selecionar un Deporte-</option>
              @foreach (App\Sport::all() as $sport)
                <option value="{{$sport->id}}">{{$sport->description}}</option>
              @endforeach
            </select><br>

            <label for="">Seleccione una Division</label><br>
            <select id="categorySelect" class="select" name="sCategory">

            </select><br>

            <label for="">Seleccione Equipos</label><br>

            {{-- <select id="teamsSelect" class="" name="">

            </select> --}}

            <input type="search" id="searchInput" placeholder="Busqueda.."><br>
            <div id="searchSuggestion" class="">

            </div>
            <button id="addTeamButton" type="button" name="button">Agregar Equipo</button><br>
            <div id="teams" class="">

            </div>
          <br>

          <label for="">Seleccione una Competencia</label><br>
          <select id="competitionSelect" class="select" name="competition">

          </select>


        </div>
      </div>

      <input id="date" type="date" value="" name="date"><br>
      <input id="description" type="text" name="description" placeholder="Ingrese descripcion">

      <br>
      <div class="form-row">
        <button class="btn btn-primary" type="submit">Grabar Evento</button>
      </div>

    </form>





    <ul>
      @foreach (App\Sport::all() as $sport)
        <li>
          <a href="{{route('adminShowEvents', $sport->id)}}">{{$sport->description}}</a>
        </li>
      @endforeach
    </ul>


    @isset($events)
      <ul>

        @foreach ($events as $event)
          <li>  {{$event->description}}</li>
        @endforeach
      </ul>
    @endisset



  </div>
</div>






<script type="text/javascript">
//aca se definen las funciones


function ajaxGet(requestTo,value) {
  return new Promise(function(resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
      resolve(JSON.parse(this.response));
    };
    xhr.onerror = reject;
    xhr.open("GET", "/api/"+requestTo+"/"+value)
    xhr.send();
  });
}




function addElements(element, addTo, data){
  var addTo = document.getElementById(addTo);

  while (addTo.firstChild) {
    addTo.removeChild(addTo.firstChild);
  }

  var init = document.createElement(element);
  init.text = '-- ';
  init.value = 0;
  addTo.appendChild(init);


  for (var i = 0; i < data.length; i++) {
    var option = document.createElement(element);
    option.text = data[i].description;
    option.value = data[i].id;
    addTo.appendChild(option);
  }
}








//aca empieza el script


// // Hear Sport Selector And create Categories
let sportSelect = document.getElementById('sportSelect');
sportSelect.onchange = function(e){
  ajaxGet('sportCategories', sportSelect.value)
  .then(function(result) {
    addElements('option', 'categorySelect', result);
    // console.log(result);
  })
  .catch(function() {
    console.log('error');
  });

}


// Hear Category Selector And create Competitions
let teamsByCategory;
let categorySelect = document.getElementById('categorySelect');
categorySelect.onchange = function(e){
  ajaxGet('teamsByCategory', categorySelect.value)
  .then(function(result) {
    // addElements('option', 'teamsSelect', result);
    teamsByCategory = result;
    // console.log(teams);
  })
  .catch(function() {
    console.log('error');
  });



  ajaxGet('competitions', categorySelect.value)
  .then(function(result) {
    addElements('option', 'competitionSelect', result);
    // teamsByCategory = result;
    // console.log(teams);
  })
  .catch(function() {
    console.log('error');
  });

}








let addTeamButton = document.getElementById("addTeamButton");
let searchInput = document.getElementById("searchInput");
let teams = document.getElementById('teams');
var found;

searchInput.oninput = function() {
    found = teamsByCategory.filter(function(teamsByCategory) {
    return teamsByCategory.description.toLowerCase().includes(searchInput.value.toLowerCase());
  });
  var suggest = [];
  for (var i = 0; i < found.length; i++) {
  suggest.push(found[i].description);
  }
  document.getElementById('searchSuggestion').innerHTML ='Sugerencia :' + suggest;
  console.log(found);
}




addTeamButton.onclick= function() {

for (var i = 0; i < found.length; i++) {
  var x = document.createElement("INPUT");
  var y = document.createElement("LABEL");
  var z = document.createElement("br");
  x.name = "teams[]";
  y.innerHTML = found[i].description;
  x.value = found[i].id;
  x.setAttribute("type", "checkbox");
  x.setAttribute("checked", true);
  teams.appendChild(y);
  teams.appendChild(x);
  teams.appendChild(z);
}
  console.log(found);
}










</script>






@endsection
