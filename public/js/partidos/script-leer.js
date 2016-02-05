$(document).ready(function(){
   cargar();
    
});
function cargar(){
     var tablaDatos = $("#datos");
   var route = 'http://localhost:8000/jugadoresList';
   $("#datos").empty();
   $.get(route,function(resp){
       $(resp).each(function(key,value){
          tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.alias+"</td><td>"+value.descripcion+"</td><td><button value="+value.id+" OnClick='mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Ver Ficha</button><button class='btn btn-danger' value="+value.id+" OnClick='eliminar(this);'>Eliminar</button></td></tr>");
       });
   
   
   });
    
}
function mostrar(btn){
    var route = 'http://localhost:8000/partidos/'+btn.value+'/edit';
    
    $.get(route,function(res){
        $("#estatus").val(res.estatus_partido);
        $("#id").val(res.id);
        
        
        
    });
    comentarios(btn);
    
    
}
function mostrar2(btn){
    var route = 'http://localhost:8000/comentarios/show/'+btn.value;
    equipo_id=0;
    $("#equipo_id").empty();
    $("#id").val(btn.value);
   $("#contenido").empty();
      $.get(route,function(res){
        equipo_id = res[0].equipos[0].id;
        $("#equipo_id").append("<option value='"+res[0].equipos[0].id+"'>"+res[0].equipos[0].nombre_equipo+"</option><option value='"+res[0].equipos[0].id+"'>"+res[0].equipos[1].nombre_equipo+"</option>");
        console.log(res[0]);
        var contenido = $("#contenido");
        for( i =0; i < res[0].comentarios.length; i++){
             contenido.append("<tr><td>Min. "+res[0].comentarios[i].minuto+"</td><td>"+res[0].comentarios[i].titulo+"</td><td>"+res[0].comentarios[i].contenido+"</td><td>"+res[0].comentarios[i].created_at+"</td></tr>");
        }
        
        
        
    });
    
    
    
}
function mostrar4(btn){
    var route = 'http://localhost:8000/partidos/setMarcador/'+btn.value;
    
   $("#contenido").empty();
   $("#id").val(btn.value);
      $.get(route,function(res){
           console.log(res[0]);
      $("#resultado_id").val(res[0].resultados.id);
        
        $("#lblLocal").html(res[0].equipos[0].nombre_equipo);
         $("#lblVisitante").html(res[0].equipos[1].nombre_equipo);
         $("#txtLocal").val(res[0].resultados.goles_local);
         $("#txtVisitante").val(res[0].resultados.goles_visitante);
        var contenido = $("#contenido");
   
             contenido.append("<tr><td>Min. "+res[0].resultados.goles_local+"</td><td>"+res[0].resultados.goles_visitante+"</td></tr>");
        
        
        
    });
    
    
    
}
function comentarios_new(id){
    var route2 = 'http://localhost:8000/comentarios/show/'+id+'';
        $("#contenido").val("");
        $("#titulo").val("");
        $("#contenido").empty();
    $.get(route2,function(res){
        //console.log(res);
        var contenido = $("#contenido");
        for( i =0; i < res[0].comentarios.length; i++){
          contenido.append("<tr><td>Min. "+res[0].comentarios[i].minuto+"</td><td>"+res[0].comentarios[i].titulo+"</td><td>"+res[0].comentarios[i].contenido+"</td><td>"+res[0].comentarios[i].created_at+"</td></tr>");
        }
        
        
        
    });
}
$("#agregar").click(function(){
    contenido = $("#comentario").val();
    titulo = $("#titulo").val();
    minuto = $("#minuto").val();
    tipo_comentario_id = $("#tipo_comentario_id").val();
    user_id = $("#user_id").val();
    partido_id = $("#id").val();
    equipo_id = $("#equipo_id").val();
     equipo_calidad = $("#equipo_calidad").val();
    var route = 'http://localhost:8000/comentarios/store';
    var token = $('#token').val();
    $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                 tipo_comentario_id: tipo_comentario_id,
                 titulo:titulo,
                 contenido: contenido,
                 user_id: user_id,
                 partido_id: partido_id,
                 equipo_id: equipo_id,
                 minuto:minuto,
                 equipo_calidad:equipo_calidad
                },
             success: function(){
                 $('#comentario').val('');
                 $('#titulo').val('');
                 comentarios_new(partido_id);
             },
            error: function(msj){
               console.log(msj.responseJSON.nombre);
               $("#msj").html(msj.responseJSON.nombre);
               $("#msj-error").fadeIn();
               
            }
         });
    
     
});
$("#actMarcador").click(function(){
    id = $("#resultado_id").val();
    console.log(id);
    goles_local = $("#txtLocal").val();
     goles_visitante = $("#txtVisitante").val();
    partido_id = $("#id").val();
     route =  "http://localhost:8000/resultados/"+id+"";
    var token = $('#token').val();
    $.ajax({
            url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
                id: id,
                 goles_local: goles_local,
                 goles_visitante: goles_visitante,
                 partido_id: partido_id
              
                },
             success: function(){
                $("#myModal4").modal('toggle');
             },
            error: function(msj){
               console.log(msj.responseJSON.nombre);
               $("#msj").html(msj.responseJSON.nombre);
               $("#msj-error").fadeIn();
               
            }
         });
    
     
});
$("#actualizar").click(function(){
    var id = $("#id").val();
    var nombre = $("#nombre").val();
    var alias = $("#alias").val();
    var equipo_id = $("#equipo_id").val();
    var descripcion = $("#descripcion").val();
    var estatura  = $("#estatura").val();
    var peso = $("#peso").val();
    var nacionalidad = $("#nacionalidad").val();
    route =  "http://localhost:8000/jugadores/"+id+"";
    token = $("#token").val();
    
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
                 nombre: nombre,
                 alias: alias,
                 equipo_id: equipo_id,
                 descripcion: descripcion,
                 estatura: estatura,
                 peso: peso,
                 nacionalidad: nacionalidad
                 
                },
             success: function(){
                 cargar();
                 $("#myModal").modal('toggle');
                  $('#msj-success').fadeIn();
                 
             }
         });
     
});
$("#finalizar").click(function(){
    var id = $("#id").val();
    route =  "http://localhost:8000/finalizarPartido/"+id+"";
    token = $("#token").val();
    
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
                 id: id
               
                 
                },
             success: function(){
                 cargar();
                 $("#myModal2").modal('toggle');
                  $('#msj-success').fadeIn();
                 
             }
         });
     
});
$("#actualizar").click(function(){
    var id = $("#id").val();
    var estatus_partido = $("#estatus").val();
    
    route =  "http://localhost:8000/partidos/"+id+"";
    token = $("#token").val();
    
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
     estatus_partido:estatus_partido
                 
                },
             success: function(){
                 $("#myModal").modal('toggle');
                 location.reload();
                 $('#msj-success').fadeIn();
                 
             }
         });
     
});     
       