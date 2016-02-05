function cargar(){
     location.reload();
}

function eliminar(btn){  
    route =  "http://localhost:8000/campeonatos/"+btn.value;
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