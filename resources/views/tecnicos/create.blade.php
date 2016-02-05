@extends('layouts.admin')
@include('alerts.validacion')
	@section('content')
	{!!Form::open(['route'=>'tecnicos.store', 'method'=>'POST'])!!}
        
	@include('tecnicos.forms.camp')
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
  