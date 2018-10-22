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
            <select id="teamsSelect1" class="select" name="teams[]">

            </select>
            {{-- <select id="teamsSelect2" class="select" name="teams[]">

          </select> --}}
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

  var default = document.createElement(element);
  default.text = '-- ';
  default.value = 0;
  addTo.appendChild(default);


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
    // Code depending on result
    addElements('option', 'categorySelect', result);
    console.log(result);
  })
  .catch(function() {
    // An error occurred
    console.log('error');
  });

}


// Hear Category Selector And create Competitions
let categorySelect = document.getElementById('categorySelect');
categorySelect.onchange = function(e){
  ajaxGet('teamsByCategory', categorySelect.value)
  .then(function(result) {
    // Code depending on result
    addElements('option', 'teamsSelect1', result);
    console.log(result);
  })
  .catch(function() {
    // An error occurred
    console.log('error');
  });
  // makeOptions('competitions', categorySelect.value, 'competitionSelect');
  // makeOptions('teams', categorySelect.value, 'teamsSelect1');
  // makeOptions('teams', categorySelect.value, 'teamsSelect2');
}




// function makeOptions(requestTo, value, select){
//
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//
//     if (this.readyState == 4 && this.status == 200) {
//
//       let response = JSON.parse(this.response);
//
//       select = document.getElementById(select);
//
//       while (select.firstChild) {
//         select.removeChild(select.firstChild);
//       }
//       var optionDefault = document.createElement("option");
//       optionDefault.text = '-- ';
//       optionDefault.value = 0;
//       select.appendChild(optionDefault);
//       for (var i = 0; i < response.length; i++) {
//
//         var option = document.createElement("option");
//         option.text = response[i].description;
//         option.value = response[i].id;
//         select.appendChild(option);
//
//       }
//     }
//     else if(this.status == 500){
//       // console.log(this.response);
//       window.location.reload(true);
//       return false;
//     }
//   };
//
//   xhttp.open("GET", "/api/"+requestTo+"/"+value , true);
//   xhttp.send();
// }
//
//
//
//
//
// // Hear Sport Selector And create Categories
// let sportSelect = document.getElementById('sportSelect');
// sportSelect.onchange = function(e){
//   makeOptions('sportCategories', sportSelect.value, 'categorySelect');
// }
//
//
// // Hear Category Selector And create Competitions
// let categorySelect = document.getElementById('categorySelect');
// categorySelect.onchange = function(e){
//   makeOptions('competitions', categorySelect.value, 'competitionSelect');
//   makeOptions('teams', categorySelect.value, 'teamsSelect1');
//   makeOptions('teams', categorySelect.value, 'teamsSelect2');
// }
//



</script>






@endsection
