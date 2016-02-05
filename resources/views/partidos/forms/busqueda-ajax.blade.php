@section('search')
<div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                           {!!Form::select('estatus_partido',[0=>'Proximamente',1=>'Jugando',2=>'Finalizado'],null,['class'=>'form-control','id'=>'busqueda'])!!}
                        </div>
    <button  class="btn btn-default" onclick="buscar()"><span class="glyphicon glyphicon-search"></span></button>
                </div>
@endsection