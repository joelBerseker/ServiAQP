<?php 
include("../../includes/sesion.php");
include("../../includes/navbar.php");
$login=true;
$titulo_html="Registrarse";
include("../../includes/data_base_autenticacion.php");
include("../../includes/data_base.php");

?>
<?php
  $message = '';
  $corr=$_POST['email'];
  $query_veri = "SELECT UsuCor FROM usuario WHERE UsuCor = '$corr'";
                
  $respuesta_veri = mysqli_query($conn, $query_veri);
  if (mysqli_num_rows($respuesta_veri)>0) {
    $message = 'Este correo ya esta en uso';
    $message_class ='danger';
  }else{
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['email'];
    //$sql = "INSERT INTO usuario (UsuCor, UsuCon, UsuRolID,UsuEst,UsuNom) VALUES (:email, :password,2,1,'$nombre' )";
    //$stmt = $conn->prepare($sql);
    //$stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    //$stmt->bindParam(':password', $password);
    $archivo_binario = (file_get_contents('../../image/usuario-sin-imagen.jpg'));

    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`,`UsuImgTip`, `UsuImgArc`, `UsuRolID`, `UsuEst`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $rol=2;
    $est=1;
    $namei="usuario-sin-imagen.jpg";
    $tipo ="image/jpeg";
    $stmt->bind_param('ssssssii',$nombre, $correo,$namei,$tipo,$password,$archivo_binario,$rol,$est);
    if(!mysqli_stmt_execute($stmt)){
       $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
       $message_class ='danger';
    }else{
        $message = 'Usuario creado correctamente. Bienvenido '.$nombre;
        $message_class ='success';
    }  
         mysqli_stmt_close($stmt);
      mysqli_close($conn);
      
    }
  }
  ?>