<?php
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

if (isset($_SESSION['user_id'])) {
  header('Location:' . $dirEjec . '/');
}
if (!empty($_POST['email']) && !empty($_POST['password'])) {

  $records = $conn_sesi->prepare('SELECT UsuID, UsuCor, UsuCon FROM usuario WHERE UsuCor = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if ($results != null && password_verify($_POST['password'], $results['UsuCon'])) {
    $_SESSION['user_id'] = $results['UsuID'];
    header('Location:' . $dirEjec . '/');
  } else {
 
    if ($results == null) {
      $message = 'Usuario no encontrado';
    } else {
      if (password_verify($_POST['password'], $results['UsuCon']) == false) {
        $message = 'Contraseña incorrecta';
      } else {
        $message = 'Ocurrio un error';
      }
    }
  }
}

include("../../includes/navbar.php");
$login = true;
$titulo_html = "Ingresar";
include("../../includes/header.php");
?>
<div class="section">
  <div class="col-md-5 mx-auto pt-4">
    <div class="card">
      <article class="card-body">
        <h4 class="card-title text-center mb-4 mt-1">INGRESAR</h4>
        <p class="card-title text-center mb-4 mt-1"> Si no tienes una cuenta, puedes registrarte <a href="../../Autenticacion/Singup">aqui</a></p>
        <hr>
        <?php if (!empty($message)) : ?>

          <p class="text-danger"> <?= $message ?></p>

        <?php endif; ?>
        <form action="index.php" method="POST">

          <div class="form-row form-group ">
            <div class="col-4"><label>Correo Electronico:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="email" name="email" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Contraseña:</label></div>
            <div class="col"><input class="form-control form-control-sm " type="password" name="password" required minlength="8"></div>
          </div>

          <div class="form-group mb-0 mt-3">
            <button type="submit" class="btn btn-primary btn-block"> Aceptar </button>
          </div> <!-- form-group// -->

        </form>
      </article>
    </div>
  </div>
</div>
<?php
include("../../includes/footer.php")
?>