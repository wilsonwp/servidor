@extends('layouts.admin')
	@section('content')
	{!!Form::model($tecnico,['route'=>['tecnicos.update',$tecnico->id],'method'=>'PUT'])!!}
	@include('tecnicos.forms.camp')
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
        
        
        {!!Form::open(['route'=>['tecnicos.destroy',$tecnico->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	@endsection
  