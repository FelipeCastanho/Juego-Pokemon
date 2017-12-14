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
	<div class="scrollmenu" align="center">
	  <a href="#home">Inicio</a>
	  <a href="#news">Perfil</a>
	  <a href="#contact">Acerca de</a>
	  <a href="#about">Salir</a>
	</div>
	<br>
	<div align="">
      @yield('content')
    </div>
	<footer align="center"> Todos los derechos reservados © </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script  src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <script  src="{{asset('js/myjs.js')}}"></script>
</body>
</html>