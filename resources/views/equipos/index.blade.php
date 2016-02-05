@extends('layouts.admin')
@section('content')
@include('equipos.modal')
	<table class="table">
		<thead>
                        <th>Nombre</th>
                        <th>Liga</th>
			<th>Alias</th>
			<th>Fecha de Fundacion</th>
                        <th>Presidente Actual</th>
                        <th>Nombre de la Hinchada</th>
			<th>Estatus</th>
                        <th>Estadio</th>
                        <th>Tecnico Actual</th>
                        <th></th>
                        <th></th>
			
                        
		</thead>
                @foreach ($equipos as $equipo)
                <tbody>
			<td>{!! Html::image('logos/'.$equipo->path,'Equipo',['width'=>'50px'])!!}{{$equipo->nombre_equipo}}</td>
                       <td>@if(!empty($equipo->campeonato->nombre_campeonato)){{$equipo->campeonato->nombre_campeonato}}@endif</td>
			<td>{{$equipo->alias}}</td>
                        <td>{{$equipo->fecha_fundacion}}</td>
                        <td>{{$equipo->presidente_actual}}</td>
                        <td>{{$equipo->nombre_hinchada}}</td>
                        <td>{{$equipo->presidente_actual}}</td>
                        <td>{{$equipo->nombre_estadio}}</td>
                        <td>@if(!empty($equipo->tecnico->nombre)) {{$equipo->tecnico->nombre}}@endif</td>
                      
                        <td>{!! link_to_route('equipos.edit', $title = 'editar', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                        <td><div><button value="{{$equipo->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
                        
                        
		</tbody>
                
                @endforeach
	</table>
            
          {!!$equipos->render()!!}
          {!!Html::script('js/equipos/borrar.js')!!}
	@endsection