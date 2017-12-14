@extends('Layout.app')
@section('content')
<div class="container-fluid" align="center">
	<div id="registroArtificial" class="col-sm-6">
		<div align="center">
			<img src="{{asset('img/entrenador.png')}}" alt="Entrenador artificial" title="Entrenador artificial" width="35%">
		</div>
		<br>
		<div align="center">
			<a href="#myModal" class="btn btn-primary" data-toggle="modal" >Registrar entrenador artificial</a>
		</div>
		<div class="modal fade in" id="myModal">
		    <div class="modal-dialog">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Modal Header</h4>
		        </div>
		        <div class="modal-body">
		          <p>Some text in the modal.</p>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
    		</div>
  		</div>
	</div>
	<br>
	<div id="buscarBatalla" class="col-sm-6">
		<div align="center">
			<img src="{{asset('img/batalla.png')}}" alt="Batalla" title="Batalla" width="47%">
		</div>
		<br>
		<div align="center">
			<a href="" class="btn btn-primary"> Entrar a batalla </a>
		</div>
	</div>
</div>
<br>
@endsection

