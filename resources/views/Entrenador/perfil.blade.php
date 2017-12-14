@extends('Layout.app')
@section('content')
<div class="container-fluid" align="center">
	<div id="form-content" class="col-sm-6">
		<div id="encabezado" class="form-group">
	    	<img id="portada" src="{{asset('img/pikachu-profile.jpg')}}" alt="Portada">
	    	<a href="#">
	    		<span  id="pen" class="glyphicon glyphicon-pencil"> </span>
	    	</a>	
	    </div>
    	<form class="formulario" id="form-perfil">
    		<div class="form-group">
    			<h3 id="nombre"> Ash Ketchum</h3>
    		</div>
    		<div class="form-group"	>
    			<input type="text" class="form-control" id="nombre" placeholder="Nombre" value="{{$entrenador->nombre}}">
    		</div>
    		<div class="form-group">
    			<input type="text" class="form-control" id="edad" placeholder="Edad" value="{{$entrenador->edad}}">
    		</div>
    		<div class="form-group" >
    			<select class="form-control" id="sexo" style="text-align:center;">
    				<option> Sexo </option>
    				<option id="femenino" value="Femenino"
    				 <?php if($entrenador->sexo == "femenino") echo "selected=''" ?> > Femenino </option>
    				<option id="masculino" value="Masculino"
    				<?php if($entrenador->sexo == "masculino") echo "selected=''" ?> > Masculino </option>
    			</select> 
    		</div>
    		<div class="form-group">
    			<input type="text" class="form-control" id="pais" placeholder="Pais" value="{{$entrenador->pais}}">
    		</div>	
    		<div class="form-group">
    			<input type="password" class="form-control" id="password" placeholder="Contraseña" value="{{$entrenador->password}}">
    		</div>
    		<div class="form-group">
    			<a href="#">
		    		<span id="pen-save" class="glyphicon glyphicon-pencil"> </span>
		    	</a>	
    		</div>
    	</form>
    </div>
    <div class="col-sm-6">
    	<h1 id="title-equipo">	Tu equipo Pokémon</h1>
    	<br>
    	<div class="container">
    		<div class="form-group" id="myPokemons">
    			<img width="20%" src="{{asset('img/pikachu.png')}}" alt="Portada"
    			id="pok1" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong>{{$listaPokemon[0]->idHabilidad1}}<br>
	    					{{$listaPokemon[0]->idHabilidad2}}<br>
	    					{{$listaPokemon[0]->idHabilidad3}}<br>
	    					{{$listaPokemon[0]->idHabilidad4}}<br>
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{asset('img/zubat.png')}}" alt="Portada"
    			id="pok2" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong> Acá se ponen las habilidades</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{asset('img/pidgeotto.png')}}" alt="Portada"
    			id="pok3" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong> Acá se ponen las habilidades</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{asset('img/mankey.png')}}" alt="Portada"
    			id="pok4" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong> Acá se ponen las habilidades</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{asset('img/gyarados.png')}}" alt="Portada"
    			id="pok5" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong> Acá se ponen las habilidades</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
				<img width="20%" src="{{asset('img/charmander.png')}}" alt="Portada"
    			id="pok6" data-html="true" title="Habilidades"
	    			data-content="
	    			<div>
	    			<strong> Acá se ponen las habilidades</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
    		</div>
    	</div>
    </div>
</div>
<br>
<div class="container" id="batallas-table">
	<h1>Historial de batallas</h1>
	<br>
	<table class="table table-bordered table-striped" id="historial">
		<thead>
			<th> Nombre oponente </th>
			<th> Resultado </th>
			<th> Fecha </th>
		</thead>
		<tbody>
			@foreach($batallas as $batalla)
				<tr>
					<td>{{$batalla->entrenadorArtificial->nickname}}</td>
					<td>{{$batalla->resultado}}</td>
					<td>{{$batalla->fecha}}</td>
				</tr>
			 @endforeach
		</tbody>
	</table>
</div>
@endsection