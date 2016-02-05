<div class="">
		{!!Form::label('Tipo de Usuario','Tipo de Usuario')!!}
		{!!Form::select('categoria_user_id',$tipo_usuarios,null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('nombre','Nombre:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('email','Correo:')!!}
		{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Correo del usuario'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('pass','Password:')!!}
		{!!Form::text('password',null,['class'=>'form-control','placeholder'=>'Password que se va a Asignar'])!!}
	</div>