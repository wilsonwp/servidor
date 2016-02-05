@extends('layouts.admin')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Campeonato creado exitosamente
</div>
@endif
	@section('content')
	<table class="table table-striped">
		<thead>
			<th>Nombre del Campeonato</th>
                        <th>Alias</th>
			<th>No. de Partidos</th>
			<th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        
		</thead>
		@foreach($campeonatos as $campeonato)
			<tbody>
				<td>{{$campeonato->nombre}}</td>
				<td>{{$campeonato->alias}}</td>
                                <td>{{$campeonato->num_partidos}}</td>
				<td>{{$campeonato->fecha_inic}}</td>
                                <td>{{$campeonato->fecha_fin}}</td>
			</tbody>
		@endforeach
	</table>
	@endsection