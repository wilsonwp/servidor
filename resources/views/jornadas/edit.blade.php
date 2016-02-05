@extends('layouts.admin')
	@section('content')
	{!!Form::model($jornada,['route'=>['jornadas.update',$jornada->id],'method'=>'PUT'])!!}
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
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
        
        
        
        {!!Form::open(['route'=>['jornadas.destroy',$jornada->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
        
	@endsection
  