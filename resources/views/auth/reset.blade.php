@extends('layouts.principal')
@include('alerts.errors')
@include('alerts.request')
@section('content')
<div class="col-sm-6">
						
						<h2>Futboleros</h2>
						<h4>Reseteo de Contraseña</h4>
                        						
					</div>
					<div class="col-sm-6">
						{!!Form::open(['url'=>'/password/reset', 'method'=>'POST','role'=>'form'])!!}
					<div class="form-group">
                                                
                                                {!!Form::hidden('token',$token,null)!!}
                                                {!!Form::label('Ingrese Correo')!!}
						{!!Form::text('email',null,['value'=>'{{old("email")}}','class'=>'form-control'])!!}
                                                
                                                
                                        
                                        </div>
                                                
                                        <div class="form-group">
                                              <div class="col-lg-10">
                                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Nueva Contraseña">
                                            </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-lg-10">
                                            <input type="password" name="password_confirmation" class="form-control" id="inputPassword_confirmation" placeholder="Repita Contraseña">
                                            </div>
                                        </div>
                                                {!!Form::submit('Reestablecer Contraseña',['class'=>'btn btn-primary'])!!}
                                                {!!Form::close()!!}
                                           
                                        


@stop
