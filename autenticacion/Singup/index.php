<?php 
include("../../includes/sesion.php");
include("../../includes/navbar.php");
$login=true;
    
$titulo_html="Registrarse";
include("../../includes/header.php");
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
    //$sql = "INSERT INTO usuario (UsuCor, UsuCon, UsuRolID,UsuEst,UsuNom) VALUES (:email, :password,2,1,'$nombre' )";
    //$stmt = $conn->prepare($sql);
    //$stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //$stmt->bindParam(':password', $password);
    $archivo_binario = (file_get_contents('../../image/usuario-sin-imagen.jpg'));

    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgArc`, `UsuRolID`, `UsuEst`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    $rol=2;
    $est=1;
    $stmt->bind_param('ssssii',$nombre, $_POST['email'],$password,$archivo_binario,$rol,$est);
    if(!mysqli_stmt_execute($stmt)){
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
      $message_class ='danger';
    }else{
      $message = 'Usuario creado correctamente';
      $message_class ='success';
    }  
      
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  
  
   
/*
    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
      $message_class ='success';
     
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
      $message_class ='danger';
    }*/
  }
  
?>
    <div style="background-color:white ">
      <div class="col-md-5 mx-auto" style="padding-top:60px;padding-bottom:100px">	
      <div class="card" >
        <article class="card-body">
          <h4 class="card-title text-center mb-4 mt-1">REGISTRARSE</h4>
          <p class="card-title text-center mb-4 mt-1"> si tienes una cuenta puedes ingresar <a href="../../Autenticacion/Login" >aqui</a></p>
          
          <hr>
          <?php if(!empty($message)): ?>
           
            <p class="text-<?=$message_class?>"> <?= $message ?></p>
            
          <?php endif; ?>
          <form action="index.php" method="POST">
          <div class="form-row form-group ">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="text" name="nombre" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Correo Electronico:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="text" name="email" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Contraseña:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="password" name="password" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Confirme contraseña:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="password" name="confirm_password" required></div>
          </div>
          
          <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"> Aceptar  </button>
          </div> <!-- form-group// -->
         
          </form>
        </article>
      </div> 
      </div>
    </div>
 

    <?php
	include("../../includes/footer.php")
?>