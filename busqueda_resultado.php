<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php

function ejecuta_consulta($labusqueda){

//$busqueda=$_GET["buscar"]; 
 
 require 'conect_datos.php';
 
 $conexion = mysqli_connect($db_host, $db_user, $db_contrasena, $db_nombre); // conexion a base de dato.
 

 if(mysqli_connect_errno($conexion)){
  echo "Fallo al conectar con la BBDD";
  exit();
 }
 
 mysqli_set_charset($conexion, "utf8");

 $query = "select * from productos where nombreartículo like '%$labusqueda%'";
 
 $consulta = mysqli_query($conexion, $query);

 echo "<div class='container'>
   <table class='table'>"; // apertura de tabla

 while($tabla = mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
  echo "<tr>
    <td>";
     
     foreach ($tabla as $i){
      echo $i;
     }
  echo " </td>
     </tr>
     <br>";
  
 }
 
 echo "</table>"; // cierre de tabla
 
 mysqli_close($conexion);
 
}
 
 ?>
</head>

<body>

<?php

$mibusqueda=$_GET["buscar"];

$mipagina=$_SERVER["PHP_SELF"];

if($mibusqueda!=NULL){
	
	ejecuta_consulta($mibusqueda);
	
}else{
	
	echo("<form action='" . $mipagina . "'method='get'>);
	
	<label>Buscar: <input type='text' name='buscar'></label>
	
	<input type='submit' name='enviando' value='dale!'></form>");
	
}

?>



</body>
</html>