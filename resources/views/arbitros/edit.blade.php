@extends('layouts.admin')
	@section('content')
	{!!Form::model($arbitro,['route'=>['arbitros.update',$arbitro->id],'method'=>'PUT'])!!}
	@include('arbitros.forms.camp')
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
        
        
        {!!Form::open(['route'=>['arbitros.destroy',$arbitro->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	@endsection
  