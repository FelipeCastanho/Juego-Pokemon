@extends('Layout.app')
@section('content')
	<div class="container" align="center">
		@include('flash::message')
	<form method="POST" action="{{url('batalla/interaccion')}}" name="formulario1">
    		{{csrf_field()}}
			<input type="text" name="p1" value="0"  id="p1" hidden="">
			<input type="text" name="p2" value="0"  id="p2" hidden="">
			<input type="text" name="p3" value="0"  id="p3" hidden="">
			<input type="text" name="p4" value="0"  id="p4" hidden="">
			<input type="text" name="p5" value="0"  id="p5" hidden="">
			<input type="text" name="p6" value="0"  id="p6" hidden="">
			<div class="form-group">
			<select class="form-control" id="sexo" name="dificultad" style="text-align:center;" required="">
				<option value=""> Selecciona la dificultad </option>
				<option id="aprendiz" value="Aprendiz"> Aprendiz </option>
				<option id="aficionado" value="Aficionado"> Aficionado </option>
				<option id="profesional" value="Profesional"> Profesional </option>
				<option id="leyenda" value="Leyenda"> Leyenda </option>
			</select> 
			</div>
		</form>
	</div>
	<div class="cotainer" align="center" style="width: 100%; height: 100%;">
		<div id="droppable" class="" style="display: inline-block; width: 25%">
			<img id="piedra" src="{{asset('img/piedra.png')}}" alt="piedra" width="50%">
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 25%">
			<img id="papel" src="{{asset('img/papel.png')}}" alt="papel" width="50%">
		</div>
		<div id="droppable3" class="" style="display: inline-block; width: 25%">
			<img id="tijeras" src="{{asset('img/tijeras.png')}}" alt="tijeras" width="50%">
		</div>
	</div>
	<div class="container" align="center">
		<div class="form-group" id="myPokemons" style="width: 100%;" >
			<div style="display: inline-block;" class="draggable" posicion="0">
				<img width="100%" src="{{$imagenes[0]}}" alt="Portada" id="pok1" >
			</div>
			<div style="display: inline-block;" class="draggable" posicion="1">
				<img width="100%" src="{{$imagenes[1]}}" alt="Portada" id="pok2" >
			</div>
			<div style="display: inline-block;" class="draggable" posicion="2">
				<img width="100%" src="{{$imagenes[2]}}" alt="Portada" id="pok3" >
			</div>
			<div style="display: inline-block;" class="draggable" posicion="3">
				<img width="100%" src="{{$imagenes[3]}}" alt="Portada" id="pok4" >
			</div>
			<div style="display: inline-block;" class="draggable" posicion="4">
				<img width="100%" src="{{$imagenes[4]}}" alt="Portada" id="pok5" >
			</div>
			<div style="display: inline-block;" class="draggable" posicion="5">
				<img width="100%" src="{{$imagenes[5]}}" alt="Portada" id="pok6" >
			</div>
    	</div>
		<div class="form-group">
				<button onclick="listar_imagenes()" id="guardar" class="btn btn-default">Pelear</button>
		</div>
	</div>
	
@endsection

@section('js')
<script>
var arregloPokemon = [0,0,0,0,0,0];
$(document).ready(function(){
    $( ".draggable" ).draggable();
    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        arregloPokemon[ui.draggable.attr("posicion")] = 1;
      }
    });
    $( "#droppable2" ).droppable({
      drop: function( event, ui ) {
       	arregloPokemon[ui.draggable.attr("posicion")] = 2;
      }
    });
    $( "#droppable3" ).droppable({
      drop: function( event, ui ) {
       	arregloPokemon[ui.draggable.attr("posicion")] = 3;
      }
    });
});

  function listar_imagenes(){
  	$( "#p1" ).val(arregloPokemon[0]);
  	$( "#p2" ).val(arregloPokemon[1]);
  	$( "#p3" ).val(arregloPokemon[2]);
  	$( "#p4" ).val(arregloPokemon[3]);
  	$( "#p5" ).val(arregloPokemon[4]);
  	$( "#p6" ).val(arregloPokemon[5]);
    document.formulario1.submit() 
}
</script>
@endsection