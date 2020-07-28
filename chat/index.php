<?php
include('../includes/sesion.php');
include('../includes/navbar.php');
$titulo_html = "Chats";
include('../includes/header.php');
include("../includes/data_base.php");
?>
<div class="wrapper">
  <div class="section">
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="chats.php" class="btn btn-primary btn-block margin-bottom">Mis chats</a>
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Mis chats
                  <span class="label label-primary pull-right"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <div class="mailbox-read-message">
              <div class="row">
                <div class="col-md-12">
                  <div class="box-header with-border">
                    <h3 class="box-title">NOMBRE USUARIO</h3>
                  </div>
                  <div id="chatsergio">
                    <?php 
                      $sergio= "gaaa";
                      $user = $user['UsuID'];
                      $sess = $_GET['creador'];
                      include("aja.php");
                    ?>
                  </div>
                  <div class="box-footer">
                    <form action="" method="post">
                      <div class="input-group">
                        <input type="text" name="mensaje" placeholder="Escribe un mensaje" class="form-control">
                            <span class="input-group-btn">
                              <input type="submit" name="enviar" class="btn btn-primary btn-flat" onclick="actualizar(<?=$sess ?>)"></button>
                            </span>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<?php
include("../includes/footer.php");
$aea="gaaaaaaa";
if(isset($_POST['enviar'])) {
  if(isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
  }

  $de = $user;
  $para = $sess;
    
    $asd="SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'";
    echo $asd;
    $comprobar = mysqli_query($conn, "SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
    $com = mysqli_fetch_array($comprobar);
  
    if(mysqli_num_rows($comprobar)  == 0) {
      $insert = mysqli_query($conn, "INSERT INTO c_chats (de,para) VALUES ('$de','$para')");
      $siguiente = mysqli_query($conn, "SELECT id_cch FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
      $si = mysqli_fetch_array($siguiente);
      $insert2 = mysqli_query($conn,"INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$si['id_cch']."','$de','$para','$mensaje',now(),'0')");
      if($insert) {echo '<script>window.location="index.php?creador='.$para.'"</script>';}
    }
    else{
      $sentencia="INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')";
      echo $sentencia;
      $insert3 = mysqli_query($conn, "INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')");
    if($insert3) {echo '<script>window.location="index.php?creador='.$para.'"</script>';}
    }
  
}

?>

