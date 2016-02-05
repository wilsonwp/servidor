$(document).ready(function(){
   cargar();
    
});
function cargar(){
     var tablaDatos = $("#datos");
   var route = 'http://localhost:8000/jornadasList';
   $("#datos").empty();
   $.get(route,function(resp){
       $(resp).each(function(key,value){
          tablaDatos.append("<tr><td>"+value.numero+"</td><td>"+value.alias+"</td><td><button value="+value.id+" OnClick='mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger' value="+value.id+" OnClick='eliminar(this);'>Eliminar</button></td></tr>");
       });
   
   
   });
    
}
function mostrar(btn){
    var route = 'http://localhost:8000/jugadores/'+btn.value+'/edit';
    $.get(route,function(res){
        $("#nombre") .val(res.nombre);
        $("#alias") .val(res.alias);
        $("#fecha_nacimiento") .val(res.fecha_nac);
        $("#nacionalidad") .val(res.nacionalidad);
        $("#peso") .val(res.peso);
        $("#estatura") .val(res.estatura);
        $("#descripcion") .val(res.descripcion);
        $("#id").val(res.id);
        
        
        
    });
    
}
$("#actualizar").click(function(){
    var id = $("#id").val();
    var nombre = $("#nombre").val();
    var alias = $("#alias").val();
    route =  "http://localhost:8000/jugadores/"+id+"";
    token = $("#token").val();
    
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'PUT',
             dataType: 'json',
             data: {
                 nombre: nombre,
                 alias: alias
                },
             success: function(){
                 cargar();
                 $("#myModal").modal('toggle');
                  $('#msj-success').fadeIn();
                 
             }
         });
     
});
function eliminar(btn){  
    route =  "http://localhost:8000/jugadores/"+btn.value;
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'DELETE',
             dataType: 'json',
             success: function(){
                 cargar();
                  $('#msj-success').fadeIn();
                 
             }
         });
    
}
        
       