@extends('Layout.app')
@section('content')

<div class="container" align="right" style="width: 100%; height: 150px;">
	<div class="form-group" id="myPokemons" style="width: 100%;" >
		<div style="display: inline-block;" class="draggable" posicion="0">
			<img width="100%" src="{{$imagenesArtificial[0]}}" alt="Portada" id="pokA1" >
		</div>
		<div style="display: inline-block;" class="draggable" posicion="1">
			<img width="100%" src="{{$imagenesArtificial[1]}}" alt="Portada" id="pokA2" >
		</div>
		<div style="display: inline-block;" class="draggable" posicion="2">
			<img width="100%" src="{{$imagenesArtificial[2]}}" alt="Portada" id="pokA3" >
		</div>
		<div style="display: inline-block;" class="draggable" posicion="3">
			<img width="100%" src="{{$imagenesArtificial[3]}}" alt="Portada" id="pokA4" >
		</div>
		<div style="display: inline-block;" class="draggable" posicion="4">
			<img width="100%" src="{{$imagenesArtificial[4]}}" alt="Portada" id="pokA5" >
		</div>
		<div style="display: inline-block;" class="draggable" posicion="5">
			<img width="100%" src="{{$imagenesArtificial[5]}}" alt="Portada" id="pokA6" >
		</div>
	</div>
</div>

<div class="container" align="center" >
	<div class="form-group" id="myPokemonsArtificial" style="width: 100%; height: 180px;" >
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/piedra.png')}}" alt="Portada" id="piedra" >
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/papel.png')}}" alt="Portada" id="papel" >
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/tijeras.png')}}" alt="Portada" id="tijeras" >
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/piedra.png')}}" alt="Portada" id="piedraA" >
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/papel.png')}}" alt="Portada" id="papelA" >
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 16%">
			<img width="100%" src="{{asset('img/tijeras.png')}}" alt="Portada" id="tijerasA" >
		</div>
	</div>
</div>

<div class="container" align="center">
	<div class="form-group" id="myPokemonsArtificial" style="width: 100%; height: 50px;" >
		<div id="droppable2" class="" style="display: inline-block; width: 40px; height: 40px;">
			<img style="width: 40px; height: 40px;" width="100%" src="{{asset('img/ganaste.png')}}" alt="Portada" id="ganaste">
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 40px; height: 40px;">
			<img style="width: 40px; height: 40px;" width="100%" src="{{asset('img/empate.png')}}" alt="Portada" id="empataste"> 
		</div>
		<div id="droppable2" class="" style="display: inline-block; width: 40px; height: 40px;">
			<img style="width: 40px; height: 40px;" src="{{asset('img/perdiste.png')}}" alt="Portada" id="perdiste">
		</div>
	</div>
</div>

<div class="container" align="left" style="width: 100%; height: 150px;">
	<div class="form-group" id="myPokemonsArtificial" style="width: 100%;" >
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
</div>
<div id="prueba"></div>
@endsection

@section('js')
<script>
$(document).ready(function(){
  /*$("#piedra").hide();
  $("#papel").hide();
  $("#tijeras").hide();
  $("#piedraA").hide();
  $("#papelA").hide();
  $("#tijerasA").hide();
  $("#pok2").hide();
  $("#pok3").hide();
  $("#pok4").hide();
  $("#pok5").hide();
  $("#pok6").hide();
  $("#pokA2").hide();
  $("#pokA3").hide();
  $("#pokA4").hide();
  $("#pokA5").hide();
  $("#pokA6").hide();
  $("#pok1").hide();
  $("#pokA1").hide();*/

  $("#pokA1").hide();
  sleep(5000);
  $("#pokA1").slideUp();
  

  /*	var retraso = 0;

	$("#pokA1").slideUp(4000).delay(1500 +retraso).fadeIn( 400 );
	$("#pok1").slideUp(4000).delay(1500+retraso).fadeIn( 400 );

	var jugada = <?php echo $jugadas[0] ?>;
	if(jugada == 1) $("#piedra").slideUp(3000).delay(1500+retraso).fadeIn(400);
	else if(jugada == 2) $("#tijeras").slideUp(4000).delay(1500+retraso).fadeIn(400);
	else if(jugada == 3) $("#papel").slideUp(4000).delay(1500+retraso).fadeIn(400);
	
	var jugadaA = <?php echo $jugadasArtificial[0] ?>;
	if(jugadaA == 1) $("#piedraA").slideUp(4000).delay(1500+retraso).fadeIn(400);
	else if(jugadaA == 2) $("#tijerasA").slideUp(4000).delay(1500+retraso).fadeIn(400);
	else if(jugadaA == 3) $("#papelA").slideUp(4000).delay(1500+retraso).fadeIn(400);

	var resultado =  <?php echo $resultados[0] ?>;
	if(resultado < 0) $("#ganaste").slideUp(4000).delay(1600+retraso).fadeIn(400);
	else if(resultado > 0) $("#perdiste").slideUp(4000).delay(1600+retraso).fadeIn(400);
	else $("#empataste").slideUp(4000).delay(1600+retraso).fadeIn(400);


//________________________________________________________________________________
	retraso += 6000;
	var lag = 0;

	$("#pokA2").slideUp(4000).delay(1500+retraso).fadeIn( 400 );
	$("#pok2").slideUp(4000).delay(1500+retraso).fadeIn( 400 );

	var jugada = <?php echo $jugadas[1] ?>;
	if(jugada == 1) $("#piedra").slideUp(3000).delay(1500+retraso-lag).fadeIn(400);
	else if(jugada == 2) $("#tijeras").slideUp(4000).delay(1500+retraso-lag).fadeIn(400);
	else if(jugada == 3) $("#papel").slideUp(4000).delay(1500+retraso-lag).fadeIn(400);
	
	var jugadaA = <?php echo $jugadasArtificial[1] ?>;
	if(jugadaA == 1) $("#piedraA").slideUp(4000).delay(1500+retraso-lag).fadeIn(400);
	else if(jugadaA == 2) $("#tijerasA").slideUp(4000).delay(1500+retraso-lag).fadeIn(400);
	else if(jugadaA == 3) $("#papelA").slideUp(4000).delay(1500+retraso-lag).fadeIn(400);

	var resultado =  <?php echo $resultados[1] ?>;
	if(resultado < 0) $("#ganaste").slideUp(4000).delay(1600+retraso-lag).fadeIn(400);
	else if(resultado > 0) $("#perdiste").slideUp(4000).delay(1600+retraso-lag).fadeIn(400);
	else $("#empataste").slideUp(4000).delay(1600+retraso-lag).fadeIn(400);




	$("#piedra").slideUp(2300).delay(400000).fadeIn(400);
	$("#papel").slideUp(2300).delay(400000).fadeIn(400);
	$("#tijeras").slideUp(2300).delay(400000).fadeIn(400);
	$("#piedraA").slideUp(2300).delay(400000).fadeIn(400);
	$("#papelA").slideUp(2300).delay(400000).fadeIn(400);
	$("#tijerasA").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok2").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok3").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok4").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok5").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok6").slideUp(2300).delay(400000).fadeIn(400);
	$("#pokA2").slideUp(2300).delay(400000).fadeIn(400);
	$("#pokA3").slideUp(2300).delay(400000).fadeIn(400);
	$("#pokA4").slideUp(2300).delay(400000).fadeIn(400);
	$("#pokA5").slideUp(2300).delay(400000).fadeIn(400);
	$("#pokA6").slideUp(2300).delay(400000).fadeIn(400);
	$("#ganaste").slideUp(2300).delay(400000).fadeIn(400);
	$("#perdiste").slideUp(2300).delay(400000).fadeIn(400);
	$("#empataste").slideUp(2300).delay(400000).fadeIn(400);
	$("#pok1").slideUp(2300).delay(400000).fadeIn(400);
  	$("#pokA1").slideUp(2300).delay(400000).fadeIn(400);*/

});
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
}
</script>
@endsection