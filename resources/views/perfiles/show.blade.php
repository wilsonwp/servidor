@extends('layouts.admin')
@section('content')
<div id='msj-success' class="alert alert-success alert-dismissible" role="alert" style="display: none">
    <strong>Perfil Actualizado de Manera Exitosa </strong>    
</div>
@include('perfiles.modal',['perfil'=>Auth::user(),'categoria'=>$categoria])
@include('perfiles.modal-busqueda')
<table class="table">
    <thead>
    <th>Tipo de Usuario : {{$categoria}}</th>
        
    </thead>
    <tbody id="datos"> </tbody>
   
</table>
@endsection
@section('scripts')
{!!Html::script('js/script-perfil.js')!!}
@endsection