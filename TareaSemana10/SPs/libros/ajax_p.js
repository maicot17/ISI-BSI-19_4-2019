jQuery(document).ready(function($){

            //mantenimiento de insertar proveedor
            $("#insertar").click(function(){

                var v_titulo = $("#titulo").val();
                var v_autor = $("#autor").val();
                var v_editorial = $("#editorial").val();
                var v_precio = $("#precio").val();

                //Expresión para validar numeros
                var expr = /^([0-9])*$/;

                if(v_titulo == "" || v_autor == "" || v_editorial == "" || v_precio == ""){
                    alert("Debe completar todos los datos para insertar libro.");
                    return false;
                } else {
                    if (!expr.test(v_precio)) {
                        alert("El precio debe ser numerico.");
                        return false;
                    } else {
                       
                        var params = {
                        "param_titulo" : v_titulo,
                        "param_autor" : v_autor,
                        "param_editorial" : v_editorial,
                        "param_precio" : v_precio
                        }   
                        
                        $.ajax({
                            type: "POST",
                            url: "libros/insertar.php",
                            data: params
                        }).done(function(msg){
                            $("#titulo").val("");
                            $("#autor").val("");
                            $("#editorial").val("");
                            $("#precio").val("");

                             $("#resultado").html(msg);
                        });
                    }
                }

                
            
        }); //fin mantenimiento insertar proveedor

        //mantenimiento de buscar proveedor
            $("#buscar").click(function(){

                var v_titulo = $("#titulo").val();
                var v_Query = "";

                //Expresión para validar numeros
                //var expr = /^([0-9])*$/;

                if(v_titulo == ""){
                    alert("Debe completar el titulo para proceder con la busqueda.");
                    return false;
                } else {

                    var entra = 0;
                    v_Query = "Select * from books where titulo ='" + v_titulo + "'";

                    var params = {
                        "Query" : v_Query
                        }   
                        
                        $.ajax({
                            type: "POST",
                            url: "libros/buscar.php",
                            data: params
                        }).done(function(msg){
                            
                            $("#resultado").html("Busqueda completada.");
                            var res = msg.split("*");                             
                            $("#IDLibro").val(res[0]);
                            $("#titulo").val(res[1]);
                            $("#autor").val(res[2]);
                            $("#editorial").val(res[3]); 
                            $("#precio").val(res[4]);     
                        });
                }

                
            
        }); //fin mantenimiento buscar proveedor

         //mantenimiento de actualizar proveedor
            $("#actualizar").click(function(){

                var v_IDLibro = $("#IDLibro").val();
                var v_titulo = $("#titulo").val();
                var v_autor = $("#autor").val();
                var v_editorial = $("#editorial").val();
                var v_precio = $("#precio").val();

                //Expresión para validar numeros
                var expr = /^([0-9])*$/;

                if(v_IDLibro == "" || v_titulo == "" || v_autor == "" || v_editorial == "" || v_precio == ""){
                    alert("Debe completar todos los datos para actualizar libro.");
                    return false;
                } else {
                    if (!expr.test(v_precio)) {
                        alert("El valor del precio debe ser numerico");
                        return false;
                    } else {
                        var params = {
                        "ID" : v_IDLibro,
                        "titulo" : v_titulo,
                        "autor" : v_autor,
                        "editorial" : v_editorial,
                        "precio" : v_precio
                        }   
                        
                        $.ajax({
                            type: "POST",
                            url: "libros/actualizar.php",
                            data: params
                        }).done(function(msg){
                            $("#IDLibro").val("");
                             $("#titulo").val("");
                            $("#autor").val("");
                            $("#editorial").val("");
                            $("#precio").val("");

                             $("#resultado").html(msg);
                        });
                    }
                }

                
            
        }); //fin mantenimiento actualizar proveedor

         //mantenimiento de eliminar proveedor
            $("#eliminar").click(function(){

                var v_IDLibro = $("#IDLibro").val();
               
                if(v_IDLibro == ""){
                    alert("Debe indicar el codigo.");
                    return false;
                } else {
                    
                        var params = {
                        "ID" : v_IDLibro
                        }   
                        
                        $.ajax({
                            type: "POST",
                            url: "libros/eliminar.php",
                            data: params
                        }).done(function(msg){
                            $("#IDLibro").val("");
                             $("#titulo").val("");
                            $("#autor").val("");
                            $("#editorial").val("");
                            $("#precio").val("");

                             $("#resultado").html(msg);
                        });
                    }

        }); //fin mantenimiento eliminar proveedor

});