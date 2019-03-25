jQuery(document).ready(function($){

            //mantenimiento
            $("#actualizarPrecio").click(function(){

                var v_editorial = $("#editorial").val();

                if(v_editorial == ""){
                    alert("Debe indicar la editorial.");
                    return false;
                } else {
                       
                        var params = {
                        "param_editorial" : v_editorial
                        }   
                        
                        $.ajax({
                            type: "POST",
                            url: "precios/actualizar10.php",
                            data: params
                        }).done(function(msg){
                            $("#aumento").val("");

                             $("#resultado").html(msg);
                        });
                }
            
        }); //fin mantenimiento

        //mantenimiento
            $("#actualizarPrecioOtro").click(function(){

                var v_editorial = $("#editorial").val();
                var v_aumento = $("#aumento").val();

                if(v_editorial == "" || v_aumento == ""){
                    alert("Debe indicar la editorial y el porcentaje de aumento.");
                    return false;
                } else {
                        //Expresión para validar numeros ^[0-9]+([,][0-9]+)?$
                        var expr = /^[0-9]+([.][0-9]+)?$/;
                        if (!expr.test(v_aumento)) {
                            alert("El valor del aumento debe ser numerico");
                            return false;
                        } else {

                            if (v_aumento <= 0) { 
                                alert("El valor del aumento debe ser mayor de 0");
                                return false;
                             } else {

                                v_aumentoConvert = v_aumento /  100;
                                alert(v_aumentoConvert);
                           
                                var params = {
                                "param_editorial" : v_editorial,
                                "param_aumento" : v_aumentoConvert
                                }   
                                
                                $.ajax({
                                    type: "POST",
                                    url: "precios/actualizarOtro.php",
                                    data: params
                                }).done(function(msg){
                                    $("#aumento").val("");

                                     $("#resultado").html(msg);
                                });
                            }
                         }
                    }

                }); //fin 

});