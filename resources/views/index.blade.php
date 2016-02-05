@extends('layouts.principal')
@include('alerts.errors')
@include('alerts.request')
@section('content')
<div class="col-sm-6">
						
	<h2>La Hinchada</h2>
	<h4>Acceso a Moderadores y Publicadores</h4>
	<hr />
	<h4>Inicia Sesión y Publica!</h4>

</div>
<div class="col-sm-6 login_modal">
	{!!Form::open(['route'=>'login.store', 'method'=>'POST'])!!}
	<div class="form-group">
		{!!Form::label('correo','Correo:')!!}	
		{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('contrasena','Contraseña:')!!}	
		{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña'])!!}
	</div>
	<div class="form-group">
	<center>{!!link_to('password/email',$title='Olvido Contraseña?',$attributes = null, $secure = null)!!}</center>
	</div>
	<div class="form-group">
	{!!Form::submit('Iniciar',['class'=>'btn btn-primary btn-lg btn-block'])!!}
                        {!!Form::close()!!}
    </div>
    <div class="form-group">
    	<a href="." class="logo"></a>
    </div>
<div>

</div>
                        
</div>
                   
</div>
                                        

@stop
