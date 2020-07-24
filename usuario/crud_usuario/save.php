<?php
$recurso="/usuario/save";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>

<?php
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $ruta = $_FILES['myFile']['tmp_name']; 
    if($ruta==null){
        $archivo_nombre="usuario-sin-imagen.jpg";
        $tipo ="image/jpg";
    }else{
        $archivo_nombre=$_FILES['myFile']['name'];
        $explode= explode('.',$archivo_nombre);
        $tipo = array_pop($explode);
        $tipo = $_FILES['myFile']['type'];
        $carpeta = "../img/";
        $rutaFinal = $carpeta.$archivo_nombre;
        move_uploaded_file($ruta,$rutaFinal);
    }
            
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $id_rol = $_POST['rol'];

    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`, `UsuImgTip`, `UsuRolID`, `UsuEst`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $stmt->bind_param('sssssii',$nombre,$correo,$password, $archivo_nombre, $tipo,$id_rol,$estado);
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

