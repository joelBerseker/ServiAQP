<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include('../includes/navbar.php');
$inicio = true;
$titulo_html = "Inicio";
include("../includes/header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chat
        <small>13 nuevos mensajes</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="chats.php" class="btn btn-primary btn-block margin-bottom">Mis chats</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Carpetas</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Mis chats
                  <span class="label label-primary pull-right">13</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-message">
              


              


      <!-- Direct Chat -->
      <div class="row">
        <div class="col-md-12">
          <!-- DIRECT CHAT PRIMARY -->
            <div class="box-header with-border">
              <h3 class="box-title">NOMBRE USUARIO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="overflow: scroll; height: 400px;">

                
                <?php
                $user = mysql_real_escape_string($_GET['usuario']);
                $sess = $_SESSION['id'];
                $chats = mysql_query("SELECT * FROM chats WHERE de = '$user' AND para = '$sess' OR de = '$sess' AND para = '$user' order by id_cha desc");
                while($ch = mysql_fetch_array($chats)) { 

                  if($ch['de'] == $user) {$var = $user;} else {$var = $sess;}
                  $usere = mysql_query("SELECT * FROM usuarios WHERE id_use = '$var'");
                  $us = mysql_fetch_array($usere);
                ?>
  

                <?php if ($ch['de'] == $user) { ?>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?php echo $us['usuario']; ?></span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $ch['fecha']; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="avatars/<?php echo $us['avatar']; ?>"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo $ch['mensaje']; ?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <?php } elseif ($ch['para'] == $user) { ?>

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo $us['usuario']; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo $ch['fecha']; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="avatars/<?php echo $us['avatar']; ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo $ch['mensaje']; ?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <?php } ?>
  

            <?php } ?>



              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">


              <form action="" method="post">
                <div class="input-group">
                  <input type="text" name="mensaje" placeholder="Escribe un mensaje" class="form-control">
                      <span class="input-group-btn">
                        <input type="submit" name="enviar" class="btn btn-primary btn-flat">Enviar</button>
                      </span>
                </div>
              </form>

              <?php
              if(isset($_POST['enviar'])) {

                $mensaje = mysql_real_escape_string($_POST['mensaje']);
                $de = $_SESSION['id'];
                $para = mysql_real_escape_string($_GET['usuario']);

                $comprobar = mysql_query("SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
                $com = mysql_fetch_array($comprobar);
                if(mysql_num_rows($comprobar) == 0) {
                  $insert = mysql_query("INSERT INTO c_chats (de,para) VALUES ('$de','$para')");
                  $siguiente = mysql_query("SELECT id_cch FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
                  $si = mysql_fetch_array($siguiente);
                  $insert2 = mysql_query("INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$si['id_cch']."','$de','$para','$mensaje',now(),'0')");
                  if($insert) {echo '<script>window.location="chat.php?usuario='.$para.'"</script>';}
                }
                else
                {
                  $insert3 = mysql_query("INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')");
                  if($insert3) {echo '<script>window.location="chat.php?usuario='.$para.'"</script>';}
                }



              }

              ?>
<?php
include("../includes/footer.php");
?>