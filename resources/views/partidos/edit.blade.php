@extends('layouts.admin')
	@section('content')
	{!!Form::model($campeonato,['route'=>['campeonatos.update',$campeonato->id],'method'=>'PUT'])!!}
	@include('campeonatos.forms.camp')
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
        
        
        {!!Form::open(['route'=>['campeonatos.destroy',$campeonato->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	@endsection
  