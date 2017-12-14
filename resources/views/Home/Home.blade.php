<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
		<meta charset="utf-8">
		<title>Gotta Catch 'Em All</title>
	</head>
	<body style="background-image:url({{asset('img/background.png')}}">
		<div class="inner-bg" align="center"> 
			<div align="center">
				<img src="{{asset('img/pokemon.png')}}" alt="Gotta Catch 'Em All" width="20%">
			</div>
		</div>
		<div class="container" id="form-content" align="center">
			@include('flash::message')
			<div class="form-group" id="formulario-inicio">
				<br>
				<div  id="form-top">
					<h5 id="sermaestro">¡Es hora de ser un maestro Pokémon!</h5>
					<br>
				</div>
				<div  class="form-group" id="form-botton">
				<br> 
					<form action="{{url('Auth/login')}}" class="formulario" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="nickname" placeholder="Nombre de usuario">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Contraseña">
						</div>
						<br>
						<div class="form-group">
							<button id="registro" type="submit" class="btn" name="registro">Registrarme</button>
							<button id="inicio" type="submit" class="btn" name="inicio">Iniciar sesión</button>
						</div>
						<div class="form-group">
							<a href="#"><span><img src="{{asset('icons/facebook.png')}}" alt="facebook" width="15%"></span>
							<a href="#"><span><img src="{{asset('icons/twitter.png')}}" alt="twitter" width="10%"></span>
							<a href="#"><span><img src="{{asset('icons/google.png')}}" alt="google+" width="10%"></span>
						</div>
					</form>	
				</div>
			</div>
		</div>
		<footer> </footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>