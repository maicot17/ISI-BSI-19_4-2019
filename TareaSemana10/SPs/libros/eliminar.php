<?php

require_once("../config.php");

if (isset($_POST["ID"]))
{
	$ID = $_POST["ID"];

	//$mysqli = mysqli_connect("localhost","root","","mitienda");
	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		//echo "Conexion completada con exito.";
		if (!$mysqli->query("call EliminaLibro($ID)")) {
	    	echo "Falló eliminacion: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	echo "Titulo eliminado con exito.";
	    	mysqli_close($mysqli);
		}
	}
} 
else 
{
  echo "Favor complete todos los datos.";
}

?>