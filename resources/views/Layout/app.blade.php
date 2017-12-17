<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">
	<meta charset="utf-8">
	<title> Gotta Catch 'Em All </title>
</head>
<body>
	<div id="navbar" class="inner-bg" align="center"> 
		<div align="center">
			<img src="{{asset('img/pokemon.png')}}" alt="Gotta Catch 'Em All" title="Gotta Catch 'Em All" width="10%">
		</div>
		<div class="scrollmenu" align="center">
		  <a href="{{url('entrenador')}}">INICIO</a>
		  <a href="{{url('entrenador/perfil')}}">PERFIL</a>
		  <a href="#">ACERCA DE</a>
		  <a href='{{url("/Auth/logout")}}'>SALIR</a>
		</div>
	</div>
	<br>
	<div align="">
      @yield('content')
    </div>
	<footer align="center"> Todos los derechos reservados © </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script  src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
   	<script  src="{{asset('js/myjs.js')}}"></script>
   	<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
   	 @yield('js')
</body>
</html>