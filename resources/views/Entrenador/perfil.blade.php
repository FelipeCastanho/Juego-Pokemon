<!DOCTYPE html>
<html lang="es">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
	<meta charset="utf-8">
	<title> Gotta Catch 'Em All </title>
</head>
<body>
	<div id="navbar" class="inner-bg" align="center"> 
		<div align="center">
			<img src="{{asset('img/pokemon.png')}}" alt="Gotta Catch 'Em All" title="Gotta Catch 'Em All" width="10%">
		</div>
	</div>
	<br>
	<div align="center">
		<div class="container-fluid">
		
		</div>
	    <div class="container-fluid">
	    	<div id="form-content" class="col-sm-6">
	    		<div id="encabezado" class="form-group">
			    	<img id="portada" src="{{asset('img/pikachu-profile.jpg')}}" alt="Portada">
			    	<a href="#">
			    		<span  id="pen" class="glyphicon glyphicon-pencil"> </span>
			    	</a>	
			    </div>
		    	<form class="formulario" id="form-perfil">
		    		<div class="form-group"	>
		    			<input type="text" class="form-control" id="nombre" placeholder="Nombre">
		    		</div>
		    		<div class="form-group">
		    			<input type="text" class="form-control" id="edad" placeholder="Edad">
		    		</div>
		    		<div class="form-group" >
		    			<select class="form-control" id="sexo" style="text-align:center;">
		    				<option> Sexo </option>
		    				<option id="femenino" value="Femenino"> Femenino </option>
		    				<option id="masculino" value="Masculino"> Masculino </option>
		    			</select> 
		    		</div>
		    		<div class="form-group">
		    			<input type="text" class="form-control" id="pais" placeholder="Pais">
		    		</div>	
		    		<div class="form-group">
		    			<input type="text" class="form-control" id="nickname" placeholder="Nombre de usuario">
		    		</div>
		    		<div class="form-group">
		    			<input type="password" class="form-control" id="password" placeholder="Contraseña">
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
			    			<strong> Acá se ponen las habilidades</strong>
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
	    			<tr>
	    				<td> Entrenador artificial </td>
	    				<td> Win </td>
	    				<td> 20/11/17 </td>
	    			</tr>
	    			<tr>
	    				<td> Entrenador artificial Ash </td>
	    				<td> Win </td>
	    				<td> 20/11/17 </td>
	    			</tr>
	    			<tr>
	    				<td> Entrenador artificial Ismael </td>
	    				<td> Win </td>
	    				<td> 20/11/17 </td>
	    			</tr>
	    			<tr>
	    				<td> Entrenador artificial Pikaboss </td>
	    				<td> Lose </td>
	    				<td> 20/11/17 </td>
	    			</tr>
	    		</tbody>
	    	</table>
	    </div>
	</div>
	<footer align="center"> Todos los derechos reservados © </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script  src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <script  src="{{asset('js/myjs.js')}}"></script>
</body>
</html>
