<?php
include("../../includes/navbar.php");
$login = true;
$titulo_html = "Registrarse";
include("../../includes/header.php");

include("../../includes/data_base.php");
?>

<?php
$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['confirm_password'])) {

  $corr = $_POST['email'];
  $query_veri = "SELECT UsuCor FROM usuario WHERE UsuCor = '$corr'";

  $respuesta_veri = mysqli_query($conn, $query_veri);
  if (mysqli_num_rows($respuesta_veri) > 0) {
    $message = 'Este correo ya esta en uso';
    $message_class = 'danger';
  } else {
    $nombre = $_POST['nombre'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $imagennombre="usuario-sin-imagen.jpg";
    $imagentipo="image/jpg";
    $query = "INSERT INTO usuario (`UsuNom`, `UsuCor`, `UsuCon`, `UsuImgNom`, `UsuRolID`, `UsuEst`, `UsuImgTip`) VALUES (?, ?, ?, ?, ?, ?,?)";
    
    $stmt = mysqli_prepare($conn, $query);
    $rol = 2;
    $est = 1;
    $stmt->bind_param('ssssiis', $nombre, $_POST['email'], $password, $imagennombre, $rol, $est, $imagentipo);
    if (!mysqli_stmt_execute($stmt)) {
      echo mysqli_stmt_error($stmt);
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
      $message_class = 'danger';
    } else {
      $message = 'Usuario creado correctamente';
      $message_class = 'success';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}

?>
<div class="section">
  <div class="col-md-5 mx-auto pt-4" >
    <div class="card">
      <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">REGISTRARSE</h4>
        <p class="card-title text-center mb-4 mt-1"> Si tienes una cuenta, puedes ingresar <a href="../../Autenticacion/Login">aqui</a></p>

        <hr>
        <?php if (!empty($message)) : ?>

          <p class="text-<?= $message_class ?>"> <?= $message ?></p>

        <?php endif; ?>
        <form action="index.php" method="POST" id="formRegistrar">
          <div class="form-row form-group ">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="text" name="nombre" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Correo Electronico:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="email" name="email" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Contraseña:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="password" name="password" id="password" minlength="8" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Confirme contraseña:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="password" name="confirm_password" minlength="8" required></div>
          </div>

          <div class="form-group mb-0 mt-3">
            <button type="submit" class="btn btn-primary btn-block "> Aceptar </button>
          </div> <!-- form-group// -->

        </form>
      </article>
    </div>
  </div>
</div>


<?php
include("../../includes/footer.php")
?>