function buscar(){
    query = $("#busqueda").val();
    //console.log(query);
    var route = 'http://localhost:8000/search_jugadores/'+query+"";
    $.get(route,function(res){
        $("#datos").empty();
        
    });
    
}
$(document).ready(function(){
    var tablaDatos = $("#datos");
    $('#busqueda').keyup(function(){
        query = $('#busqueda').val();
        var route = 'http://localhost:8000/search_jugadores/'+query+"";
         $("#datos").empty();
         $.get(route,function(resp){
            for (i=0; i < resp.lenght; i++){
                
            }
       $(resp).each(function(key,value){
           console.log(value);
          tablaDatos.append("<tr><td>"+value.nombre+"</td><td>"+value.alias+"</td><td>"+value.descripcion+"</td><td><button value="+value.id+" OnClick='mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Ver Ficha</button><button class='btn btn-danger' value="+value.id+" OnClick='eliminar(this);'>Eliminar</button></td></tr>");
       });
   
   
   });
         
        //console.log(consulta);
        
    });
});
