<?php

require_once("../config.php");

if (isset($_POST["Query"]))
{
  	$Query = $_POST["Query"];

	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		
		if (!($resultado = $mysqli->query($Query))) {
	    	echo "Falló la busqueda: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	$contar = @mysqli_num_rows($resultado);
              
            if($contar == 0){
                  echo "No se han encontrado resultados";
            } else {
              
	              while($row=mysqli_fetch_array($resultado)){
						echo $row['ID']."*".$row['titulo']."*".$row['autor']."*".$row['editorial']."*".$row['precio'];
	            	}
		    		mysqli_close($mysqli);
				}
			}
		}
	} else 
	{
	  echo "Favor complete todos los datos.";
	}

?>