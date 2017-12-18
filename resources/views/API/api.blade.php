<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
	<meta charset="utf-8">
	<title> PokeAPI </title>
</head>
<body>
	<div id="navbar" class="inner-bg" align="center"> 
		<div align="center">
			<img src="{{asset('img/pokemon.png')}}" alt="Gotta Catch 'Em All" title="Gotta Catch 'Em All" width="10%">
		</div>		
	</div>
	<br>
	<br>
	<div  class="container" align="center">
		<div class="form-group">
			<form action="users/show" method="GET">
				<div class="input-group">
					<input type="number" min="1" name="entrenador" class="form-control" placeholder="Id entrenador">
					<button style="width: 20%" class="btn" type="submit" name="consulta">Consultar</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</body>
<footer align="center"> Todos los derechos reservados © </footer>
</html>