@extends('layouts.admin')
	@section('content')
	<div class="content_form">
		{!!Form::model($campeonato,['route'=>['campeonatos.update',$campeonato->id],'method'=>'PUT', 'class'=>'form-horizontal','files'=>true])!!}
		@include('campeonatos.forms.camp')
		<div class="col-sm-6">
			{!!Form::submit('Editar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
		</div>
		{!!Form::close()!!}
		    
		    
		{!!Form::open(['route'=>['campeonatos.destroy',$campeonato->id],'method'=>'DELETE'])!!}
		<div class="col-sm-6">
			{!!Form::submit('Borrar',['class'=>'btn btn-danger btn-lg btn-block'])!!}
		</div>
		{!!Form::close()!!}
	</div>
	@endsection
  