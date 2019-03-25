<?php

require_once("../config.php");

if (isset($_POST["param_editorial"]))
{
	$editorial = $_POST["param_editorial"];

	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		
		if (!$mysqli->query("call SubirPrecio10('$editorial')")) {
	    	echo "Falló actualizacion: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	echo "Precios de la Editorial ".$editorial." actualizado con exito.";
	    	mysqli_close($mysqli);
		}
	}
} 
else 
{
  echo "Favor complete todos los datos.";
}

?>