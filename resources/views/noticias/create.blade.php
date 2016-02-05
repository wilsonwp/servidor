@extends('layouts.admin')
@section('content')
@include('alerts.ajax-auth')
@include('alerts.ajax-success')
{!!Form::open(['route'=>'noticias.store','method'=>'POST'])!!}
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
    @include('noticias.forms.camp',$categorias)
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}   
{!!Form::close()!!}
@endsection
@section('scripts')
<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>
<script type="text/javascript">
editor_config.selector = "textarea";
editor_config.path_absolute = "http://laravel-filemanager.rhcloud.com/";
tinymce.init(editor_config);
</script>
@endsection