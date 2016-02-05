$("#estatus").change(function(event){
    $.get("/select_resultado/"+event.target.value+"",function(response,state){
        $("#estadio").empty();
        console.log(response);
        for (i=0; i<response.length; i++){
            $("#estadio").append("<option value='"+response[i].nombre_estadio+"'>"+response[i].nombre_estadio+"</option>");
        }
    });
    
    
    
});