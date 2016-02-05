 <div class="form-group">
		{!!Form::label('','Estatus del Partido')!!}
		{!!Form::select('estatus_partido',[0=>'Proximamente',1=>'Jugando',2=>'Finalizado'],null,['class'=>'form-control','id'=>'estatus'])!!}
	</div>