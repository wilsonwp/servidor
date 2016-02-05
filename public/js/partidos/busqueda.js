$("#busqueda").change(function(event){
    $.get("/select_estatus/"+event.target.value+"",function(response,state){
        for(i=0; i<response.length; i++){
            console.log(response[i]);
          
        }
    });
    
    
    
});
function mostrar(btn){
   console.log(btn);
        
        
        
        
}