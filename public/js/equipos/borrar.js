function mostrar(btn){
    console.log(btn.value);
    var route = 'http://localhost:8000/equipos/show/'+btn.value+'';
    $.get(route,function(res){
         $("#id") .val(res.id);
    });
}
function eliminar(){
    id =$("#id").val();
    route =  "http://localhost:8000/equipos/"+id;
    token = $("#token").val();
     $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'DELETE',
             dataType: 'json',
             success: function(){
                  $('#msj-success').fadeIn();   
                  location.reload();
       }
            
         });
    
}
function volver(){
        $("#myModal").modal('toggle');
    
}