@extends('layouts.principal')
@include('alerts.errors')
@include('alerts.request')
@section('content')
<div class="col-sm-6">
						
						<h2>Futboleros</h2>
						<h4>Reseteo de Contraseña</h4>
						
					</div>
					<div class="col-sm-6">
						{!!Form::open(['url'=>'/password/email', 'method'=>'POST'])!!}
					<div class="form-group">
						{!!Form::label('correo','Correo:')!!}	
						{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa tu correo'])!!}
                                                {!!Form::submit('Enviar Link',['class'=>'btn btn-primary'])!!}
                                                {!!Form::close()!!}
                                        
                                        </div>
					    
					</div>
                                       
                                        


@stop
