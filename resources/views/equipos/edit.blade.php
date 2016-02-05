@extends('layouts.admin')
@include('alerts.validacion')
	@section('content')
	{!!Form::model($equipo,['route'=>['equipos.update',$equipo->id],'method'=>'PUT','files'=>true])!!}
        @include('equipos.forms.camp',['campeonatos'=>$campeonatos,'tecnicos'=>$tecnicos])
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
  