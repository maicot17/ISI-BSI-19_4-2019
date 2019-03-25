$(document).ready(function(){
       
        //mantenimiento de busqueda
			$("#buscar").click(function(){
              var consulta;                         
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#cedula").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "ajax/buscar_persona.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#resultado").empty();
                    //$("#resultado").append(data);
						
					var res = data.split("*");			                    
					$("#nombre").val(res[0]);
					$("#estado").val(res[1]);
					$("#fecha_ingreso").val(res[2]);
					$("#edad").val(res[3]);                                         
                    }
              });                                                                         
        });  

	//mantenimiento de actualizacion
			$("#actualizar").click(function(){
              //cogemos el valor del input
				var cedula = jQuery("#cedula").val();
				var nombre = jQuery("#nombre").val();
				var activo = jQuery("#estado").val();
				var fecha_ingreso = jQuery("#fecha_ingreso").val();
				var edad = jQuery("#edad").val();

				var params = {
						"cedula" : cedula,
						"nombre" : nombre,
						"activo" : activo,
						"fecha_ingreso" : fecha_ingreso,
						"edad" : edad
				}
		                                                                   
              $.ajax({
					data:  params,
					url:   'ajax/actualiza_persona.php',
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
		
		//mantenimiento de eliminacion
			$("#eliminar").click(function(){
              //cogemos el valor del input
				var cedula = jQuery("#cedula").val();

				var params = {
						"cedula" : cedula
				}
		                                                                   
              $.ajax({
					data:  params,
					url:   'ajax/elimina_persona.php',
					dataType: 'php',
					type:  'post',
					success:  function (data) {
						//mostramos salida del PHP
						//jQuery("#resultado").html("Actualizacion Completada..." + data);
						jQuery("#resultado").empty();
                    	jQuery("#resultado").append("Eliminacion Completada...");
					},
					error: function(data) {
						//mostramos salida del PHP
						//jQuery("#resultado").html("Error al actualizar..." + data);
						jQuery("#resultado").empty();
                    	jQuery("#resultado").append("Eliminacion Completada...");
					}
			
			}); 
			
        });//fin mantenimiento eliminar
			
});      