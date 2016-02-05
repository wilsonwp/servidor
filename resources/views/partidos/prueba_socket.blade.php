@extends('layouts.admin')
@include('alerts.message')
<div id='msj-success' class="alert alert-success alert-dismissible" role="alert" >
    <strong> </strong>    
</div>

@section('content')
hola
@endsection


  <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('266bc3fa36806eff8b48', {
      encrypted: false
    });
    var channel = pusher.subscribe('comentarios_canal');
    channel.bind('ComentarioCreado', function(data) {
      console.log(data.comentario);
      alert(data.comentario.contenido);
    });
  </script>