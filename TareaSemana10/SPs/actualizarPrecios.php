<?php

require_once("config.php");

  $Query = 'Select DISTINCT (editorial) from books';
  $conn = new connection();
  $mysqli = $conn->get_connection();
  $editoriales = "";

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
                
                while($row= mysqli_fetch_array($resultado)){
                   $editoriales .=" <option value='".$row[0]."'>".$row[0]."</option>";
                }
            mysqli_close($mysqli);
        }
      }
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizar precios de editorial</title>
</head>

    <LINK REL=StyleSheet HREF="css/style.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="precios/ajax_actualiza.js"></script>
<body>

<div>
<table width="500" border="0" align="center">
  <tr>
    <td colspan="4"><h2>Actualizar precios de libros por editorial</h2></td>
  </tr>
  <tr>
    <td colspan="2">Editorial</td>
    <td colspan="2"><select name="editorial" id="editorial"><?php echo $editoriales; ?></select></td>
  </tr>
   <tr>
    <td colspan="2">Porcentaje de aumento</td>
    <td colspan="2"><input type="text" name="aumento" id="aumento"/></td>
  </tr>
  <tr>
    <td colspan="4"><p></p></td>
  </tr>
  <tr>
    <td align="center" colspan="2">
    <button id="actualizarPrecio">Actualizar al 10%</button>
    </td>
    <td align="center" colspan="2">
    <button id="actualizarPrecioOtro">Actualizar al porcentaje indicado</button>
    </td>
  </tr>
  <tr>
    <td colspan="4"><p></p></td>
  </tr>
   <tr>
    <td colspan="4"><div id="resultado"></div></td>
  </tr>
</table>

</div>

</body>
</html>