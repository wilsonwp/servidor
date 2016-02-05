<div class="">
		{!!Form::label('','Liga a que Pertenece')!!}
		{!!Form::select('campeonato_id',$campeonatos,null,['class'=>'form-control'])!!}
	</div>
        <div class="">
		{!!Form::label('','Tecnico del Equipo')!!}
		{!!Form::select('tecnico_id',$tecnicos,null,['class'=>'form-control'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('','Nombre del Equipo:')!!}
		{!!Form::text('nombre_equipo',null,['class'=>'form-control','placeholder'=>'Ingrese el Nombre del Equipo'])!!}
	</div>
          <div class="">
		{!!Form::label('','Estadio del Equipo')!!}
		{!!Form::text('nombre_estadio',null,['class'=>'form-control'])!!}
	</div>
        <div class="form-group">
		{!!Form::label('','Fecha de Fundacion:')!!}
		{!!Form::date('fecha_fundacion',null,['class'=>'form-control'])!!}
	</div>
        <div class="form-group">
	{!!Form::label('Poster','Logo del Equipo:')!!}
	{!!Form::file('path')!!}
        </div>
        <div class="form-group">
		{!!Form::label('','Presidente del Equipo:')!!}
		{!!Form::text('presidente_actual',null,['class'=>'form-control','placeholder'=>'Ingrese Nombre completo del Presidente'])!!}

	</div>  
	<div class="form-group">
		{!!Form::label('','Colores del Equipo:')!!}
		 <input class="" name="color1" type="color" value=""/>  <input class="" name="color2" type="color" value="#f3f3f3"/>  <input class=""  name="color3" type="color" value=""/>
		
	</div>
 

        