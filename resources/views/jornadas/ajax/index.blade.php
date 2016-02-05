@extends('layouts.admin')
@section('content')
@include('alerts.ajax-success-act')
@include('jornadas.ajax.modal',['jornadas'=>$jornadas,'campeonatos'=>'campeonatos'])
<table class="table">
    <thead>
    <th>Campeonato</th>
    <th>Numero de Jornada</th>
    <th>Fecha de Inicio</th>
    <th>Fecha Fin</th>
    <th>Operaciones</th>
    </thead>
    <tbody id="datos"> </tbody>
   
</table>
@endsection
@section('scripts')
{!!Html::script('js/jornadas/leer.js')!!}
@endsection