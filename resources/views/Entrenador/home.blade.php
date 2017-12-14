@extends('Layout.app')
@section('content')
<div class="container-fluid" align="center">
	<div id="registroArtificial" class="col-sm-6">
		<div align="center">
			<img src="{{asset('img/entrenador.png')}}" alt="Entrenador artificial" title="Entrenador artificial" width="35%">
		</div>
		<br>
		<div align="center">
			<a href="{{url('artificial/registro')}}" id="botonuno" class="btn btn-default">Registrar entrenador artificial</a>
		</div>
	</div>
	<br>
	<div id="buscarBatalla" class="col-sm-6">
		<div align="center">
			<img src="{{asset('img/batalla.png')}}"  alt="Batalla" title="Batalla" width="47%">
		</div>
		<br>
		<div align="center">
			<a href="" id="botondos" class="btn btn-default"> Entrar a batalla </a>
		</div>
	</div>
</div>
<br>
@endsection