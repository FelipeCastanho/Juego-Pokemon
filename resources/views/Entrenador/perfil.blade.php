@extends('Layout.app')
@section('content')
<div class="container-fluid" align="center">
	<div id="form-content" class="col-sm-6">
		<div id="encabezado" class="form-group">
	    	<img id="portada" src="\ProyectoWWW\public\img\perfiles\{{$entrenador->imagenPerfil}}" alt="Portada">
	    </div>
    	<form action="{{url('entrenador/editar')}}" class="formulario" id="form-perfil" method="POST" enctype="multipart/form-data" >
    		{{csrf_field()}}
    		<div id="imgPerfil" class="glyphicon glyphicon-camera" align="center">
			    <input id="imagenPerfil" type="file" name="imagenPerfil">
			</div>
			<br>
    		<div class="form-group">
    			<h3 id="nombre">{{$nickname}}</h3>
    		</div>
    		<div class="form-group"	>
    			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{$entrenador->nombre}}" 
    			minlength="5" maxlength="20">
    		</div>
    		<div class="form-group">
    			<input type="text" class="form-control" name="edad" id="edad" placeholder="Edad" value="{{$entrenador->edad}}" min="5">
    		</div>
    		<div class="form-group" >
    			<select class="form-control" name="sexo" id="sexo" style="text-align:center;">
    				<option> Sexo </option>
    				<option id="femenino" value="Femenino"
    				 <?php if($entrenador->sexo == "Femenino") echo "selected=''" ?> > Femenino </option>
    				<option id="masculino" value="Masculino"
    				<?php if($entrenador->sexo == "Masculino") echo "selected=''" ?> > Masculino </option>
    			</select> 
    		</div>
    		<div class="form-group">
    			<input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" value="{{$entrenador->pais}}">
    		</div>	
    		<div class="form-group">
    			<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="{{$entrenador->password}}" hidden="" min="4" max="15">
    		</div>
    		<div class="form-group">
    			<button style="background-color: transparent !important; border:none;" class="btn btn-primary"><span id="pen-save" class="glyphicon glyphicon-pencil"> </span></button>
		    		
		    	</a>	
    		</div>
    	</form>
    </div>
    <div class="col-sm-6">
    	<h1 id="title-equipo">	Tu equipo Pokémon</h1>
    	<br>
    	<div class="container">
    		<div class="form-group" id="myPokemons">
    			<img width="20%" src="{{$imagenes[0]}}" alt="Portada"
    			id="pok1" data-html="true"   <?php echo 'title="'. ucwords($pokemon[0]->nombre) .'<br>Habilidades"';?>  			 
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[0])}}<br></li>
	    				<li>{{ucwords($habilidades[1])}}<br></li>
	    				<li>{{ucwords($habilidades[2])}}<br></li>
	    				<li>{{ucwords($habilidades[3])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[0]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[1]}}" alt="Portada"
    			id="pok2" data-html="true" <?php echo 'title="'. ucwords($pokemon[1]->nombre) .'<br>Habilidades"';?>
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[4])}}<br></li>
	    				<li>{{ucwords($habilidades[5])}}<br></li>
	    				<li>{{ucwords($habilidades[6])}}<br></li>
	    				<li>{{ucwords($habilidades[7])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[1]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[2]}}" alt="Portada"
    			id="pok3" data-html="true" <?php echo 'title="'. ucwords($pokemon[2]->nombre) .'<br>Habilidades"';?>
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[8])}}<br></li>
	    				<li>{{ucwords($habilidades[9])}}<br></li>
	    				<li>{{ucwords($habilidades[10])}}<br></li>
	    				<li>{{ucwords($habilidades[11])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[2]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[3]}}" alt="Portada"
    			id="pok4" data-html="true" <?php echo 'title="'. ucwords($pokemon[3]->nombre) .'<br>Habilidades"';?>
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[12])}}<br></li>
	    				<li>{{ucwords($habilidades[13])}}<br></li>
	    				<li>{{ucwords($habilidades[14])}}<br></li>
	    				<li>{{ucwords($habilidades[15])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[3]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[4]}}" alt="Portada"
    			id="pok5" data-html="true" <?php echo 'title="'. ucwords($pokemon[4]->nombre) .'<br>Habilidades"';?>
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[16])}}<br></li>
	    				<li>{{ucwords($habilidades[17])}}<br></li>
	    				<li>{{ucwords($habilidades[18])}}<br></li>
	    				<li>{{ucwords($habilidades[19])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[4]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
				<img width="20%" src="{{$imagenes[5]}}" alt="Portada"
    			id="pok6" data-html="true" <?php echo 'title="'. ucwords($pokemon[5]->nombre) .'<br>Habilidades"';?>
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[20])}}<br></li>
	    				<li>{{ucwords($habilidades[21])}}<br></li>
	    				<li>{{ucwords($habilidades[22])}}<br></li>
	    				<li>{{ucwords($habilidades[23])}}<br></li>
	    				@if($batallasGanadas >= 10)
	    				<br>
	    				<a href='{{url('entrenador/editarPokemon',['pokemon' => $pokemon[5]])}}' class='btn cambiarPokemon'>Cambiar</a>
	    				@endif
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
    		</div>
    	</div>
    </div>
</div>
<br>
<div class="container" id="batallas-table" align="center">
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