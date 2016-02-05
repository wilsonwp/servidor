@extends('layouts.admin')
@include('alerts.validacion')
	@section('content')
	{!!Form::open(['route'=>'partidos.store', 'method'=>'POST'])!!}
        <div class="form-group">
		{!!Form::label('','Campeonato a que Pertenece')!!}
		{!!Form::select('campeonato_id',$campeonatos,null,['class'=>'form-control','id'=>'campeonato'])!!}
	</div>
       <div class="form-group">
		{!!Form::label('','Jornada')!!}
		{!!Form::select('jornada_id',[],null,['class'=>'form-control','id'=>'jornada','placeholder'=>'Seleccionar Campeonato al que Pertenece...'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('','Equipo Visitante')!!}
		{!!Form::select('equipo_visitante',[],null,['class'=>'form-control','id'=>'visitante','placeholder'=>'Seleccionar Campeonato al que Pertenece...'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('','Equipo Local')!!}
		{!!Form::select('equipo_local',[],null,['class'=>'form-control','id'=>'local','placeholder'=>'Seleccionar Campeonato al que Pertenece...'])!!}
	</div>
         <div class="form-group">
		{!!Form::label('','Estadio que se Juega el Partido')!!}
		{!!Form::select('estadio',[],null,['class'=>'form-control','id'=>'estadio','placeholder'=>'Seleccionar Equipo Local...'])!!}
	</div>
          <div class="form-group">
		{!!Form::label('','Nombre de Arbitro')!!}
		{!!Form::text('nombre_arbitro',null,['class'=>'form-control','id'=>'nombre_arbitro','placeholder'=>'Nombre del Arbitro'])!!}
	</div>
         <div class="form-group">
		{!!Form::label('','Estatus del Partido')!!}
		{!!Form::select('estatus_partido',[0=>'Proximamente',1=>'Jugando',2=>'Finalizado'],null,['class'=>'form-control','id'=>'estatus'])!!}
	</div>
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
        @section('scripts')
        {!!Html::script('js/partidos/dropdown.js')!!}
        @endsection
  