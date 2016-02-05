@extends('layouts.admin')
@section('content')
@include('alerts.message');
@include('arbitros.modal');
	<table class="table">
		<thead>
			<th>Nombre de Arbitro</th>
                        <th>Alias</th>
			<th>Nacionalidad</th>
                        <th>Acciones</th>
                        <th></th>
                        
		</thead>
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                
                @foreach($arbitros as $arbitro)
			<tbody>
				<td>{{$arbitro->nombre}}</td>
                                <td>{{$arbitro->alias}}</td>
                                <td>{{$arbitro->nacionalidad}}</td>
                                <td>{!! link_to_route('arbitros.edit', $title = 'editar', $parameters = $arbitro->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                                 <td><div><button value="{{$arbitro->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
                                
			</tbody>
		@endforeach
                @section('scripts')
                {!!Html::script('js/arbitros/borrar.js')!!}
                @endsection
	
	
	</table>
        {!!$arbitros->render()!!}
	@endsection