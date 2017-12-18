<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
		<meta charset="utf-8">
		<title>Gotta Catch 'Em All</title>
	</head>
	<body id="body-image" style="background-image:url({{asset('img/background.png')}}">
		<div class="inner-bg" align="center"> 
			<div align="center">
				<img src="{{asset('img/pokemon.png')}}" alt="Gotta Catch 'Em All" width="20%">
			</div>
		</div>

		<div class="container" id="progress-bar">
		  <div class="progress">
		    <div class="progress-bar progress-bar-striped progress-bar-animated" id="barra" style="width:1%">
		    	¡Estamos preparando un equipo Pokemón ideal para ti!
		    </div>
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
					<form class="formulario" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nombre de usuario" minlength="4" maxlength="10" required="true">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" minlength="4" maxlength="15" required="true">
						<br>
						<div class="form-group">
							<button id="registro" type="submit" class="btn" name="registro" onclick = "this.form.action = '{{url('Auth/register')}}'">Registrarme</button>
						</div>
						<div class="form-group">
							<button id="inicio" type="submit" class="btn" name="inicio" onclick = "this.form.action = '{{url('Auth/login')}}'" >Iniciar sesión</button>
						</div>
						<div class="form-group">
							<a href="{{ url('/Auth/facebook') }}"><span><img src="{{asset('icons/facebook.png')}}" alt="facebook" width="15%"></span>
							<a href="{{ url('/Auth/twitter') }}"><span><img src="{{asset('icons/twitter.png')}}" alt="twitter" width="10%"></span>
							<a href="{{ url('/Auth/google') }}"><span><img src="{{asset('icons/google.png')}}" alt="google+" width="10%"></span>
						</div>
					</form>	
				</div>
			</div>
		</div>
		<footer> </footer>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				var x = 1;
				$('#progress-bar').hide();
				function bar(){
					$("#registro").click(function(){
						var nick = document.getElementById("nickname").value;
						var pass = document.getElementById("password").value;
						if (nick.length >= 4 && pass.length >= 4 && nick.length <= 10 && pass.length <= 15) {
							$("#progress-bar").show();
							progress(x);
						}
					});
				}
				
				function progress(){
					document.getElementById("barra").style.width = x +"%";
					x += 2;
				}
				setInterval(bar, 95);
			});
		</script>

	</body>
</html>