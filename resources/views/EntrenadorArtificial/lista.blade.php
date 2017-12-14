@extends('Layout.app')
@section('content')
<div class="container" align="center">
	<h1>Registrar entrenador artificial</h1>
	<br>
	<form>
		<div class="form-group">
			<input type="text" class="form-control" id="nombre" placeholder="Nombre" value="">
		</div>
		<div class="form-group">
			<select class="form-control" id="sexo" style="text-align:center;">
				<option > Selecciona la dificultad </option>
				<option id="aprendiz" value="Aprendiz"> Aprendiz </option>
				<option id="aficionado" value="Aficionado"> Aficionado </option>
				<option id="profesional" value="Profesional"> Profesional </option>
				<option id="leyenda" value="Leyenda"> Leyenda </option>
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
			<tr>
				<td> Entrenador artificial </td>
				<td> Aprendiz </td>
				<td><a href="#"><span class="glyphicon glyphicon-eye-open"> </span></a>	</td>
			</tr>
			<tr>
				<td> Entrenador artificial Ash </td>
				<td> Aficionado </td>
				<td><a href="#"><span class="glyphicon glyphicon-eye-open"> </span></a>	</td>
			</tr>
			<tr>
				<td> Entrenador artificial Ismael </td>
				<td> Profesional </td>
				<td><a href="#"><span class="glyphicon glyphicon-eye-open"> </span></a>	</td>
			</tr>
			<tr>
				<td> Entrenador artificial Pikaboss </td>
				<td> Leyenda </td>
				<td><a href="#"><span class="glyphicon glyphicon-eye-open"> </span></a>	</td>
				</tr>
		</tbody>
	</table>
</div>
@endsection