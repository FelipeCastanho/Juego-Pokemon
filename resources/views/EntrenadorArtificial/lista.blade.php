@extends('Layout.app')
@section('content')
<div class="container" align="center">
	<h1>Registrar entrenador artificial</h1>
	<br>
	<form method="POST" action="{{url('artificial/registrar')}}">
		{{csrf_field()}}
		<div class="form-group">
			<input type="text" class="form-control" id="nombre" placeholder="Nombre" value="" name="nombre" required="">
		</div>
		<div class="form-group">
			<select class="form-control" id="sexo" name="dificultad" style="text-align:center;" required="">
				<option value=""> Selecciona la dificultad </option>
				<option id="aprendiz" value="Aprendiz"> Aprendiz </option>
				<option id="aficionado" value="Aficionado"> Aficionado </option>
				<option id="profesional" value="Profesional"> Profesional </option>
				<option id="leyenda" value="Leyenda"> Leyenda </option>
			</select> 
		</div>
		<div class="form-group">
			<select data-placeholder="Escoge 6 pokémon" class="form-control" name="chose[]" id="chose" style="text-align:center;" required="" multiple>
				@foreach($nombres as $nombre)
					<option value="{{$nombre[0]}}">{{$nombre[1]}}</option>
				@endforeach
			</select> 
		</div>
		<br>
		<button id="guardar" class="btn btn-default">Guardar</button>
	</form>
</div>
<br>
<div class="container" id="listartificial" align="center">
	<h1>Historial de batallas</h1>
	<br>
	<table class="table table-bordered table-striped" id="historial">
		<thead>
			<th> Nombre entrenador </th>
			<th> Dificultad </th>
			<th> </th>
		</thead>
		<tbody>
			@foreach($lista as $entrenadorArtificial)
				<tr>
					<td> {{$entrenadorArtificial->entrenador->nickname}} </td>
					<td> {{$entrenadorArtificial->dificultad}}  </td>
					<td>
						<form method="POST" action="{{url('artificial/perfil')}}">
							{{csrf_field()}}
							<input type="text" name="id" value="{{$entrenadorArtificial->id}}" hidden="">
							<button style="background-color: transparent !important; border:none;"><span class="glyphicon glyphicon-eye-open"> </span></button>
						</form>
					</td>
				</tr>
			 @endforeach
		</tbody>
	</table>
</div>
@endsection

@section('js')

<script>
	$('#chose').chosen({max_selected_options: 6});
</script>

@endsection