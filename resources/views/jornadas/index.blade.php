@extends('layouts.admin')
@section('content')
@include('jornadas.modal')
	<table class="table">
		<thead>
                        <th>No. de la Jornada</th>
			<th>Fecha de la Jornada</th>
			<th>Campeonato</th>
                        <th>Acciones</th>
                        <th></th>
                        
                        
		</thead>
                @foreach ($jornadas as $jornada)
                <tbody>
			<td>No. {{$jornada->numero}}</td>
			<td>{{$jornada->fecha}}</td>
                        <td>@if(!empty($jornada->campeonato->nombre_campeonato)) {{$jornada->campeonato->nombre_campeonato}}@endif</td>
                        <td>{!! link_to_route('jornadas.edit', $title = 'editar', $parameters = $jornada->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>                       
                        <td><div><button value="{{$jornada->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
		</tbody>
                
                @endforeach
               
	
	
	</table>
          {!!$jornadas->render()!!}
          {!!Html::script('js/jornadas/borrar.js')!!}
	@endsection