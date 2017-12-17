@extends('Layout.app')
@section('content')
	<div class="cotainer">
		<div id="divPiedra" class="">
			<img id="piedra" src="{{asset('img/piedra.png')}}" alt="piedra" width="15%">
		</div>
		<div id="divPapel" class="">
			<img id="papel" src="{{asset('img/papel.png')}}" alt="papel" width="15%">
		</div>
		<div id="divTijeras" class="">
			<img id="tijeras" src="{{asset('img/tijeras.png')}}" alt="tijeras" width="15%">
		</div>
	</div>
	<div class="container">
		<div class="form-group" id="myPokemons">
    			<img width="20%" src="{{$imagenes[0]}}" alt="Portada"
    			id="pok1">
	    		<img width="20%" src="{{$imagenes[1]}}" alt="Portada"
    			id="pok2">
	    		<img width="20%" src="{{$imagenes[2]}}" alt="Portada"
    			id="pok3">
	    		<img width="20%" src="{{$imagenes[3]}}" alt="Portada"
    			id="pok4">
	    		<img width="20%" src="{{$imagenes[4]}}" alt="Portada"
    			id="pok5">
				<img width="20%" src="{{$imagenes[5]}}" alt="Portada"
    			id="pok6">
    		</div>
	</div>
@endsection