jQuery(document).ready(function($){

    $("a").click(function(event)
        {
            link=$(this).attr("href");
            $.ajax(
                {
                    url: link,
                })
            .done(function(php){
                $("#content").empty().append(php);
            })
            .fail(function(html){
                console.log('error');
            })
            .always(function(html){
                console.log('complete');
            });
            return false;
        });


    //mantenimiento de actualizacion datos de tienda
            $("#actDatos").click(function(){
                alert("hola mundo");
              //cogemos el valor del input
                var id_tienda = jQuery("#id_tienda").val();
                var nombreSuper = jQuery("#nombreSuper").val();
                var cedula = jQuery("#cedula").val();
                var direccion = jQuery("#direccion").val();
                var telefono = jQuery("#telefono").val();
                var correo = jQuery("#correo").val();

                var params = {
                        "id_tienda" : id_tienda,
                        "nombreSuper" : nombreSuper,
                        "cedula" : cedula,
                        "activo" : activo,
                        "telefono" : telefono,
                        "correo" : correo
                }
                                                                           
              $.ajax({
                    data:  params,
                    url:   '../class/Datos/actualiza.php',
                    dataType: 'php',
                    type:  'post',
                    success:  function (data) {
                        //mostramos salida del PHP
                        //jQuery("#resultado").html("Actualizacion Completada..." + data);
                        jQuery("#resultado").empty();
                        jQuery("#resultado").append("Actualizacion Completada...");
                    },
                    error: function(data) {
                        //mostramos salida del PHP
                        //jQuery("#resultado").html("Error al actualizar..." + data);
                        jQuery("#resultado").empty();
                        jQuery("#resultado").append("Actualizacion Completada...");
                    }
            
            }); 
            
        }); //fin mantenimiento actualizar


});