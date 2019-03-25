<?php

require_once("../config.php");

if (isset($_POST["param_editorial"]) || isset($_POST["param_aumento"]))
{
	$editorial = $_POST["param_editorial"];
	$aumento = $_POST["param_aumento"];

	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		
		if (!$mysqli->query("call SubirPrecio('$editorial',$aumento)")) {
	    	echo "Falló actualizacion: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	echo "Precios de la Editorial ".$editorial." actualizado con exito, segun el porcentaje indicado.";
	    	mysqli_close($mysqli);
		}
	}
} 
else 
{
  echo "Favor complete todos los datos.";
}

?>