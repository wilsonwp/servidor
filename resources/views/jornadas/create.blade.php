@extends('layouts.admin')
@include('alerts.validacion')
@if(Session::has('message'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 {{Session::get('message')}}
</div>
@endif
	@section('content')
	{!!Form::open(['route'=>'jornadas.store', 'method'=>'POST'])!!}
        <div class="">
		{!!Form::label('','Campeonato al que Pertenece')!!}
		{!!Form::select('campeonato_id',$campeonatos,null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('','Numero de Jornada:')!!}
		{!!Form::text('numero',null,['class'=>'form-control','placeholder'=>'Ingrese el Numero de la Jornada'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('','Fecha de la Jornada')!!}
		{!!Form::date('fecha',null,['class'=>'form-control'])!!}
	</div>
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
  