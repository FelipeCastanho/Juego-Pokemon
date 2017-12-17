@extends('Layout.app')
@section('content')

<div class="container-fluid" align="center">
	<div id="form-content" class="col-sm-6">
		<div id="encabezado" class="form-group">
	    	<img id="portada" src="{{asset('img\perfil.jpg')}}" alt="Portada">
	    </div>
    	<form action="{{url('artificial/modificar')}}" class="formulario" id="form-perfil" method="POST">
    		{{csrf_field()}}
    		<input type="text" name="idArtificial" value="{{$entrenador->artificial->id}}" hidden="">
    		<div class="form-group">
    			<h3 id="nombre">{{$entrenador->nickname}}</h3>    			
    		</div>
    		<div class="form-group">
				<select class="form-control" id="sexo" name="dificultad" style="text-align:center;" required="">
					<option value=""> Selecciona la dificultad </option>
					<option id="aprendiz" value="Aprendiz"<?php if($entrenador->artificial->dificultad == "Aprendiz") echo "selected=''" ?> > Aprendiz </option>
					<option id="aficionado" value="Aficionado" <?php if($entrenador->artificial->dificultad == "Aficionado") echo "selected=''" ?> > Aficionado </option>
					<option id="profesional" value="Profesional" <?php if($entrenador->artificial->dificultad == "Profesional") echo "selected=''" ?> > Profesional </option>
					<option id="leyenda" value="Leyenda" <?php if($entrenador->artificial->dificultad == "Leyenda") echo "selected=''" ?> > Leyenda </option>
				</select> 
			</div>
    		
    		<div class="form-group">
    			<button style="background-color: transparent !important; border:none;"><span id="pen-save" class="glyphicon glyphicon-pencil"> </span></button>
		    	</a>	
    		</div>
    	</form>
    </div>
    <div class="col-sm-6">
    	<h1 id="title-equipo">Tu equipo Pokémon</h1>
    	<br>
    	<div class="container">
    		<div class="form-group" id="myPokemons">
    			<img width="20%" src="{{$imagenes[0]}}" alt="Portada"
    			id="pok1" data-html="true"  <?php echo 'title="'. ucwords($pokemon[0]->nombre) .'<br>Habilidades"';?>  			 
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[0])}}<br></li>
	    				<li>{{ucwords($habilidades[1])}}<br></li>
	    				<li>{{ucwords($habilidades[2])}}<br></li>
	    				<li>{{ucwords($habilidades[3])}}<br></li>
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[1]}}" alt="Portada"
    			id="pok2" data-html="true"  <?php echo 'title="'. ucwords($pokemon[1]->nombre) .'<br>Habilidades"';?>  			 
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[4])}}<br></li>
	    				<li>{{ucwords($habilidades[5])}}<br></li>
	    				<li>{{ucwords($habilidades[6])}}<br></li>
	    				<li>{{ucwords($habilidades[7])}}<br></li>
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
	    		<img width="20%" src="{{$imagenes[2]}}" alt="Portada"
    			id="pok3" data-html="true"  <?php echo 'title="'. ucwords($pokemon[2]->nombre) .'<br>Habilidades"';?>  			 
	    			data-content="
	    			<div>
	    			<strong>
	    				<li>{{ucwords($habilidades[8])}}<br></li>
	    				<li>{{ucwords($habilidades[9])}}<br></li>
	    				<li>{{ucwords($habilidades[10])}}<br></li>
	    				<li>{{ucwords($habilidades[11])}}<br></li>
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
	    			</strong>
	    			</div>"
	    			data-placement="bottom" data-toggle="popover">
    		</div>
    	</div>
    </div>
</div>
@endsection
