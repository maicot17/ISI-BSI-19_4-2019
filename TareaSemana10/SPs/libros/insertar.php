<?php

require_once("../config.php");


if (isset($_POST["param_titulo"]) || isset($_POST["param_autor"]) || isset($_POST["param_editorial"]) || isset($_POST["param_precio"]))
{
  	$titulo = $_POST["param_titulo"];
 	$autor = $_POST['param_autor'];
  	$editorial = $_POST['param_editorial'];
	$precio = $_POST['param_precio'];

	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		//echo "Conexion completada con exito.";
		if (!$mysqli->query("call InsertarLibro('$titulo','$autor','$editorial',$precio)")) {
	    	echo "Falló CALL: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	echo "Libro ".$titulo." insertado con exito.";
	    	mysqli_close($mysqli);
		}
	}
} 
else 
{
  echo "Favor complete todos los datos.";
}

?>