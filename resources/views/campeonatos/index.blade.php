@extends('layouts.admin')
@section('content')
@include('alerts.message')
@include('campeonatos.modal')  
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Nombre del Campeonato</th>
                        <th>Alias</th>
			<th>No. de Partidos</th>
			<th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Acciones</th>
                        <th></th>
                        <th></th>
                        
		</thead>
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                @foreach($campeonatos as $campeonato)
			<tbody>
				<td>{!! Html::image('logos/'.$campeonato->path,'Proximamente',['width'=>'100px'])!!}{{$campeonato->nombre_campeonato}}</td>
                                <td>{{$campeonato->alias}}</td>
				<td>{{$campeonato->num_partidos}}</td>
                                <td>{{$campeonato->fecha_inic}}</td>
                                <td>{{$campeonato->fecha_fin}}</td>
                                <td>{!! link_to_route('campeonatos.edit', $title = 'editar', $parameters = $campeonato->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                                <td><div><button value="{{$campeonato->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
                                
                                
			</tbody>
		@endforeach
                @section('scripts')
                {!!Html::script('js/campeonatos/borrar.js')!!}
                @endsection
	
	
	</table>
</div>
        {!!$campeonatos->render()!!}
	@endsection