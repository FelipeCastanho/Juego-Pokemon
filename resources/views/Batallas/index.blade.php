@extends('Layout.app')
@section('content')
	<div class="cotainer" align="center">
		<div id="" class="">
			<img id="piedra" src="{{asset('img/piedra.png')}}" alt="piedra" width="15%">
		</div>
		<div id="" class="">
			<img id="papel" src="{{asset('img/papel.png')}}" alt="papel" width="15%">
		</div>
		<div id="" class="">
			<img id="tijeras" src="{{asset('img/tijeras.png')}}" alt="tijeras" width="15%">
		</div>
	</div>
	<div class="container" align="center">
		<div class="form-group" id="myPokemons">
			<div>
				<img width="8%" src="{{$imagenes[0]}}" alt="Portada" id="pok1">
			</div>
			<div>
				<img width="8%" src="{{$imagenes[1]}}" alt="Portada" id="pok2">
			</div>
			<div>
				<img width="8%" src="{{$imagenes[2]}}" alt="Portada" id="pok3">
			</div>
			<div>
				<img width="8%" src="{{$imagenes[3]}}" alt="Portada" id="pok4">
			</div>
			<div>
				<img width="8%" src="{{$imagenes[4]}}" alt="Portada" id="pok5">
			</div>
			<div>
				<img width="8%" src="{{$imagenes[5]}}" alt="Portada" id="pok6">
			</div>
    	</div>
	</div>
@endsection