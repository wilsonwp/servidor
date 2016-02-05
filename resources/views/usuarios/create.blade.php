@extends('layouts.admin')
@section('content')
@include('alerts.validacion')
    
	{!!Form::open(['route'=>'users.store', 'method'=>'POST'])!!}
        @include('usuarios.forms.camp')
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
  