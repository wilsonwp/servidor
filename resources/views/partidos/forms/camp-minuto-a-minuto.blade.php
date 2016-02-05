<div class="form-group">
    {!!Form::label('','')!!}
                {!!Form::label('','Minuto')!!}
                  {!!Form::select('minuto',range(1,121),null,['class'=>'form-control','id'=>'minuto'])!!}
                     {!!Form::label('','Visitante o Local')!!}
               {!!Form::select('equipo_calidad',[1=>'Local',2=>'Visitante'],null,['class'=>'form-control','id'=>'equipo_calidad'])!!}
                    {!!Form::label('','Equipo')!!}
               {!!Form::select('equipo_id',[],null,['class'=>'form-control','id'=>'equipo_id'])!!}
                  {!!Form::label('','Tipo de Suceso')!!}
               {!!Form::select('tipo_comentario_id',[1=>'Falta',2=>'Fuera de Juego',3=>'Tiro al Arco',4=>'Gol',5=>'Medio Tiempo',6=>'Minutos Extra',7=>'Final del Partido'],null,['class'=>'form-control','id'=>'tipo_comentario_id'])!!}
               {!!Form::label('','Titulo')!!}
                {!!Form::text('titulo',null,['class'=>'form-control','id'=>'titulo'])!!}
                 {!!Form::label('','Descripcion')!!}
    {!!Form::textarea('comentario',null,['class'=>'form-control','id'=>'comentario'])!!}
  </div>