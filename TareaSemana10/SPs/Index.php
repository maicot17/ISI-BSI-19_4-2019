<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de Libros</title>
</head>

    <LINK REL=StyleSheet HREF="css/style.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="libros/ajax_p.js"></script>
<body>

<div>
<table width="500" border="0" align="center">
  <tr>
    <td colspan="4"><h2>Registro de Libros</h2></td>
  </tr>
   <tr>
    <td colspan="2">Codigo Libro</td>
    <td colspan="2"><input type="text" name="IDLibro" id="IDLibro" readonly="" /></td>
  </tr>
  <tr>
    <td colspan="2">Titulo</td>
    <td colspan="2"><input type="text" name="titulo" id="titulo"/></td>
  </tr>
  <tr>
    <td width="230" colspan="2">Autor</td>
    <td width="253" colspan="2"><input type="text" name="autor" id="autor"/></td>
  </tr>
  <tr>
    <td colspan="2">Editorial</td>
    <td colspan="2"><input type="text" name="editorial" id="editorial"/></td>
  </tr>
  <tr>
    <td colspan="2">Precio</td>
    <td colspan="2"><input type="text" name="precio" id="precio"/></td>
  </tr>
  
  <tr>
    <td colspan="4"><p></p></td>
  </tr>
  <tr>
    <td align="center">
    <button id="insertar">Insertar</button>
    </td>
    <td align="center">
    <button id="buscar">Buscar</button>
    </td>
    <td align="center">
    <button id="actualizar">Actualizar</button>
    </td>
    <td align="center">
    <button id="eliminar">Eliminar</button>
    </td>
  </tr>
  <tr>
    <td colspan="4"><p></p></td>
  </tr>
   <tr>
    <td colspan="4"><div id="resultado"></div></td>
  </tr>
</table>

<p>Para eliminar y actualizar libros debe realizar primero la busqueda, ya que requerimos el ID del libro, la busqueda puede realizarse por titulo.</p> 

<p><a href="actualizarPrecios.php" target="_blank">Actualizar precios editorial</a></p> 


</div>

</body>
</html>