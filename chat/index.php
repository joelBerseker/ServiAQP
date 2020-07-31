<?php
include('../includes/sesion.php');
include('../includes/global_variable.php');


include("../includes/data_base.php");

?>

<div>
  <hr class="mt-3 mb-2">
  <div class="box-header with-border">
    <?php
    $sql = "SELECT * FROM usuario WHERE UsuID=" . $_GET['creador'];
    $result = mysqli_query($conn, $sql);
    $row5 = mysqli_fetch_array($result)
    ?>
    <nav aria-label="breadcrumb" class="mb-2">
      <ol class="breadcrumb p-0">
        <li class="breadcrumb-item"><a href="<?php echo $dirEjec ?>/usuario/view/?id=<?=$user['UsuID']?>&opcion=5">Mis chats</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $row5["UsuNom"] ?></li>
      </ol>
    </nav>
  </div>
  <div id="chatsergio">
    <?php
    $sergio = "gaaa";
    $user = $user['UsuID'];
    $sess = $_GET['creador'];
    include("aja.php");
    ?>
  </div>
  <div class="box-footer pt-2">
    <div class="row no-gutters">
      <div class="col">
        <form id="FormMensaje">
          <div class="input-group">
            <input type="text" id="mensaje" name="mensaje" placeholder="Escribe un mensaje" class="form-control form-control-sm">
            <input type="hidden" name="creador" id="creador" value="<?= $sess ?>">
          </div>
        </form>
      </div>
      <div class="col-auto">
        <span class="input-group-btn">
          <button class="btn btn-primary btn-flat ml-2 btn-sm" onclick="enviarMensaje()">Enviar</button>
        </span>
      </div>
    </div>
  </div>
</div>