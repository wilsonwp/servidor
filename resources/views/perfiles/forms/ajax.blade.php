<div class="form-group">
     {!!Form::label('','Nombre:')!!}
     {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Ingresa tu Nombre'])!!}
       {!!Form::label('','Nickname:')!!}
     {!!Form::text('nickname',null,['id'=>'nickname','class'=>'form-control'])!!}
      {!!Form::label('','Telefono:')!!}
     {!!Form::text('telefono',null,['id'=>'telefono','class'=>'form-control'])!!}
     {!!Form::label('','Direccion:')!!}
      {!!Form::text('direccion',null,['id'=>'direccion','class'=>'form-control'])!!}
      {!!Form::label('','Correo:')!!}
      {!!Form::text('correo',null,['id'=>'correo','class'=>'form-control','disabled'=>'disabled'])!!}
      {!!Form::label('','Tipo de Usuario:')!!}
      {!!Form::text('tipo_usuario',$categoria,['id'=>'tipo_usuario','class'=>'form-control','disabled'=>'disabled'])!!}
      
      
</div>