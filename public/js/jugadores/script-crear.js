$('#registro').click(
        function(){
         var nombre = $('#nombre').val();
         var alias = $('#alias').val();
         var fecha_nacimiento = $('#fecha_nacimiento').val();
         var nacionalidad = $('#nacionalidad').val();
         var peso = $('#peso').val();
         var estatura = $('#estatura').val();
         var descripcion = $('#descripcion').val();
         
         var equipo_id = $('#equipo_id').val();
         var route = 'http://localhost:8000/jugadores';
         var token = $('#token').val();
         
         $.ajax({
             url: route,
             headers: {'X-CSRF-TOKEN': token},
             type: 'POST',
             dataType: 'json',
             data: {
                 nombre: nombre,
                 alias: alias,
                 fecha_nac: fecha_nacimiento,
                 nacionalidad: nacionalidad,
                 peso: peso,
                 estatura: estatura,
                 descripcion: descripcion,
                 equipo_id: equipo_id,
                 
                },
             success: function(){
                 $('#msj-success').fadeIn();
                 $('#nombre').val('');
                 $('#alias').val('');
                 $('#fecha_nacimiento').val('');
                 $('#nacionalidad').val('');
                 $('#peso').val('');
                 $('#estatura').val('');
                 $('#descripcion').val('');
                 $('#equipo_id').val('');
             },
            error: function(msj){
               console.log(msj.responseJSON.nombre);
               $("#msj").html(msj.responseJSON.nombre);
               $("#msj-error").fadeIn();
               
            }
         });
        });