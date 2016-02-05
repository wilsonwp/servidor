@extends('layouts.perfil')
@include('alerts.message')
@include('alerts.validacion')
@section('content')  
	{!!Form::open(['route'=>'perfiles.store', 'method'=>'POST'])!!}
        {!!Form::hidden('token',$token,null)!!}
        
   <div class="form-group">
    <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
    <div class="col-lg-10">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Contraseña">
    </div>
  </div>
         <div class="form-group">
    <label for="inputPassword" class="col-lg-2 control-label">Confirmar Contraseña</label>
    <div class="col-lg-10">
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword_confirmation" placeholder="Contraseña">
    </div>
  </div>
        <div>
        {!!Form::submit('Cambiar Contraseña',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
      
        </div>
	