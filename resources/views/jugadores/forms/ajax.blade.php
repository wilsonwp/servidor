<div class="form-group">
     {!!Form::label('','Nombre:')!!}
     {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Ingrese Nombre del Jugador'])!!}
      {!!Form::label('','Alias:')!!}
     {!!Form::text('alias',null,['id'=>'alias','class'=>'form-control','placeholder'=>'Ingrese Alias del Jugador'])!!}
      {!!Form::label('','Fecha de Nacimiento:')!!}
     {!!Form::date('fecha_nac',null,['id'=>'fecha_nacimiento','class'=>'form-control'])!!}
      {!!Form::label('','Nacionalidad:')!!}
     {!!Form::text('nacionalidad',null,['id'=>'nacionalidad','class'=>'form-control','placeholder'=>'Ingrese Nacionalidad'])!!}
      {!!Form::label('','Peso:')!!}
     {!!Form::text('peso',null,['id'=>'peso','class'=>'form-control','placeholder'=>'Ingrese Peso Jugador'])!!}
      {!!Form::label('','Equipo al que Pertenece:')!!}
   {!!Form::select('equipo_id',$equipos,null,['class'=>'form-control','id'=>'equipo_id'])!!}
   {!!Form::label('','Estatura:')!!}
     {!!Form::text('estatura',null,['id'=>'estatura','class'=>'form-control','placeholder'=>'Ingrese Estatura'])!!}
      {!!Form::label('','Descripcion:')!!}
     {!!Form::textarea('descripcion0',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'Ingrese Descripcion'])!!}
     
</div>