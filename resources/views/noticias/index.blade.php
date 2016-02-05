@extends('layouts.admin')
@section('content')
@include('alerts.ajax-success-act')
@include('noticias.modal',['noticias'=>$noticias])
<i class='fa fa-plus fa-fw'></i>
<input type="hidden" name="categoria" value="{!!Auth::user()->categoria_user_id!!}" id="categoria">
<input type="hidden" name="id_usuario" value="{!!Auth::user()->id!!}" id="id_usuario">
    <div id="datos" > </div>
   
@endsection
@section('scripts')
{!!Html::script('js/noticias/script-leer.js')!!}
{!!Html::script('js/noticias/script-buscar.js')!!}
@endsection