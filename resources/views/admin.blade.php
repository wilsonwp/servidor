@extends('layouts.admin')
@section('search')
<form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                 <input type="text" class="form-control" placeholder="Buscar">
                        </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
@endsection
@include('alerts.message')
@section('content')




@stop