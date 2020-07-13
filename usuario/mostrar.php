<?php
include("../includes/data_base.php");
// Para obtener el id de la imagen pondremos en la barra del navegador 
// http://localhost:8888/GuardarVerImagePdfPhpMysql/ver.php?id=1
    $id = filter_input(INPUT_GET, 'id');
    if($id==''){
    die ("No tenemos el id");
    }
 
// Conectamos a mysql
 
$sql="select UsuImgArc, UsuImgTip from usuario where UsuID = $id"; 
 
// Ejecutar la sentencia sql
$resultado = mysqli_query($conn, $sql) or die("Error: no se pudo hacer la consulta.");
 
while($row = mysqli_fetch_array($resultado)){
  $archivo= $row['UsuImgArc']; // Obtener el archivo
  $tipo=$row['UsuImgTip'];     // Obtener el tipo de archivo
}
 
mysqli_close($conn);
 
// Header para tranformar la salida en el tipo de archivo que hemos guardado
header("Content-type: $tipo"); 
 
// Imprimir el archivo
echo $archivo;
?>