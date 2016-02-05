@extends('layouts.admin')
@section('content')
@include('alerts.validacion')
	{!!Form::model($user,['route'=>['users.update',$user->id],'method'=>'PUT'])!!}
        @include('usuarios.forms.camp')
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	
   {!!Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE'])!!}
	{!!Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
        
        @endsection