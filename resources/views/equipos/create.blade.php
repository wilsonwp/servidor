@extends('layouts.admin')
@include('alerts.validacion')
	@section('content')
	{!!Form::open(['route'=>'equipos.store', 'method'=>'POST','files'=>true])!!}
        @include('equipos.forms.camp',['campeonatos'=>$campeonatos,'tecnicos'=>$tecnicos])
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
  