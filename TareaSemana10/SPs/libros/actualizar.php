<?php

require_once("../config.php");

if (isset($_POST["ID"]) || isset($_POST["titulo"]) || isset($_POST["autor"]) || isset($_POST["editorial"]) || isset($_POST["precio"]))
{
	$ID = $_POST["ID"];
  	$titulo = $_POST["titulo"];
 	$autor = $_POST['autor'];
  	$editorial = $_POST['editorial'];
	$precio = $_POST['precio'];

	$conn = new connection();
	$mysqli = $conn->get_connection();

	if ($mysqli->connect_errno) {
	    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	} else {
		
		if (!$mysqli->query("call UpdateLibro('$ID','$titulo','$autor','$editorial',$precio)")) {
	    	echo "Falló actualizacion: (" . $mysqli->errno . ") " . $mysqli->error;
	    } else {
	    	echo "Titulo ".$titulo." actualizado con exito.";
	    	mysqli_close($mysqli);
		}
	}
} 
else 
{
  echo "Favor complete todos los datos.";
}

?>