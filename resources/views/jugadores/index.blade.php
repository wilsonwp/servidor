@extends('layouts.admin')
@section('content')
@include('alerts.ajax-success-act')
@include('jugadores.modal',['equipos'=>$equipos])
@include('jugadores.forms.busqueda-ajax')
<table class="table">
    <thead>
    <th>Nombre</th>
    <th>Alias</th>
    <th>Descripcion</th>
    <th>Acciones</th>
    </thead>
    <tbody id="datos"> </tbody>
   
</table>
@endsection
@section('scripts')
{!!Html::script('js/jugadores/script-leer.js')!!}
{!!Html::script('js/jugadores/script-buscar.js')!!}
@endsection