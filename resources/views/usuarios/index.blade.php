@extends('layouts.admin')
	@section('content')
@include('usuarios.modal')

@include('alerts.message')
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
                        <th>Tipo de Usuario</th>
                        <th>Password</th>
			<th>Operacion</th><th></th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<td>{{$user->nombre}}</td>
				<td>{{$user->email}}</td>
                                <td> {{$user->categoria_user->nombre_categoria}}</td>
                                <td>{{$user->password}}</td>
                                <td>{!! link_to_route('users.edit', $title = 'editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']);!!}</td>
                                 <td><div><button value="{{$user->id}}" class='btn btn-danger' onclick="mostrar(this)" data-toggle="modal" data-target="#myModal">Eliminar</button></td> 
			</tbody>
		@endforeach
	</table>
			{!!Html::script('js/usuarios/borrar.js')!!}
          {!!$users->render()!!}
	@endsection