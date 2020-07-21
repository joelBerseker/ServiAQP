<?php
include ('../../includes/sesion.php');
include ('../../includes/data_base.php');
$recurso="/Usuario/save";
//include ('../../includes/acl.php');
?>

<?php
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $archivo_nombre=$_FILES['myFile']['name'];
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    if($archivo_temp==null){
        $archivo_binario = (file_get_contents('../../image/usuario-sin-imagen.jpg'));
    }else{
        $archivo_binario = (file_get_contents($archivo_temp));
    }
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $id_rol = $_POST['rol'];

    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`, `UsuImgTip`, `UsuImgArc`, `UsuRolID`, `UsuEst`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('ssssssii',$nombre,$correo,$password, $archivo_nombre, $archivo_tipo, $archivo_binario,$id_rol,$estado);
    if(!mysqli_stmt_execute($stmt)){
        echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
      }  
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: ../index.php");
}
else{
    echo "No envio";
}


?>

