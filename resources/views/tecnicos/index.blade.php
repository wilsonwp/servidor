@extends('layouts.admin')
@section('content')
@include('tecnicos.modal')
@include('alerts.message');
	<table class="table">
		<thead>
			<th>Nombre del Tecnico</th>
                        <th>Alias</th>
			<th>Nacionalidad</th>
			<th>Acciones</th>
                        <th></th>
                        
		</thead>
                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                @foreach($tecnicos as $tecnico)
			<tbody>
				<td>{{$tecnico->nombre}}</td>
                                <td>{{$tecnico->alias}}</td>
                                <td>{{$tecnico->nacionalidad}}</td>
                                
                                <td>{!! link_to_route('tecnicos.edit', $title = 'editar', $parameters = $tecnico->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                                <td><div><button value="{{$tecnico->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
                                
			</tbody>
		@endforeach
                @section('scripts')
                @endsection
	
	
	</table>
        {!!$tecnicos->render()!!}
        {!!Html::script('js/tecnicos/borrar.js')!!}
	@endsection