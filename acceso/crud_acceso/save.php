<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Acceso/save";
//include("../../includes/acl.php");
?>

<?php
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['rol'];
    $id_recurso = $_POST['recurso'];
    
    /*$pruebita = $_POST['imagenmuestra'];
    #$archivo_nombre=$_FILES['myFile']['name'];
    #$archivo_tipo = $_FILES['myFile']['type'];
    #$archivo_temp = $_FILES['myFile']['tmp_name'];
    #if($archivo_temp==null){
    #    $archivo_binario = (file_get_contents('../../image/objeto-sin-imagen.png'));
    #}else{
        $archivo_binario = (file_get_contents($archivo_temp));
    }*/
    //$estado = $_POST['estado'];
    #$query = "INSERT INTO categoria (`CatNom`, `CatDes`, `CatImgNom`, `CatImpTip`, `CatImgArc`, `CatEst`) VALUES (?, ?, ?, ?, ?, ?)";
    $query = "INSERT INTO acceso(AccRolId, AccRecId, AccNom) VALUES ('$id_rol','$id_recurso','$nombre')";
    $stmt = mysqli_prepare($conn,$query);
    #$stmt->bind_param('sssssi',$nombre,$descripcion,$archivo_nombre, $archivo_tipo, $archivo_binario,$estado);
    echo $query;
    $stmt->bind_param('ssi',$nombre);
    if(!mysqli_stmt_execute($stmt)){
        echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
    }      
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../");
}
else{
    echo "no envio";
}

?>