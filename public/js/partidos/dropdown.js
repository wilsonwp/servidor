$("#campeonato").change(function(event){
    $.get("/select_jornadas/"+event.target.value+"",function(response,state){
        $("#jornada").empty();
        for (i=0; i<response.length; i++){
            $("#jornada").append("<option value='"+response[i].id+"'> Jornada No."+response[i].numero+"</option>");
        }
    });
    $.get("/select_equipos/"+event.target.value+"",function(response,state){
        $("#visitante").empty();
        $("#local").empty();
        for (i=0; i<response.length; i++){
            $("#visitante").append("<option value='"+response[i].id+"'>"+response[i].nombre_equipo+"</option>");
             $("#local").append("<option value='"+response[i].id+"'>"+response[i].nombre_equipo+"</option>");
        }
    });
    
    
    
});
$("#local").change(function(event){
    $.get("/select_estadio/"+event.target.value+"",function(response,state){
        $("#estadio").empty();
        console.log(response);
        for (i=0; i<response.length; i++){
            $("#estadio").append("<option value='"+response[i].nombre_estadio+"'>"+response[i].nombre_estadio+"</option>");
        }
    });
    
    
    
});

