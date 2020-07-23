<?php
include("../includes/sesion.php");
include("../includes/data_base.php");
include("../includes/global_variable.php");
?>
<?php
$gaa="gaaaa";
if(isset($_GET['leido'])) {
  
  $leido = mysql_real_escape_string($_GET['leido']);
  $usuariod = mysql_real_escape_string($_GET['usuario']);
  
  $tchats = mysql_query("SELECT * FROM chats WHERE de = '$usuariod' OR para = '$usuariod'");
  $tc = mysql_fetch_array($tchats);
  if($tc['de'] != $_SESSION['id']) {
  $update = mysql_query("UPDATE chats SET leido = '1' WHERE de = '$usuariod' OR para = '$usuariod'");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chats</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../frontend/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel
  
  ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../frontend/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../frontend/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../frontend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../frontend/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../frontend/plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
include('../includes/navbar.php');
$titulo_html = "Servicios";
include('../includes/header.php');
include("../includes/data_base.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="section">
    <!-- Content Header (Page header) -->
    <section class="container">
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

                

$sergio= "gaaa";
              

                  $user = $user['UsuID'];
                
                  $sess = $_GET['creador'];
      
                  $chats = mysqli_query($conn, "SELECT * FROM chats WHERE de = '$user' AND para = '$sess' OR de = '$sess' AND para = '$user' order by id_cha desc");
                  while($ch = mysqli_fetch_array($chats)) { 
                    
                    if($ch['de'] == $user) {$var = $user;  } else {$var = $sess;}
                    
                    $usere = mysqli_query($conn, "SELECT * FROM usuario WHERE UsuID = '$var'");
                    $us = mysqli_fetch_array($usere);
                  
                
                ?>
  

                <?php
                if ($ch['para'] == $user) { ?>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
<?php
                  if(isset($_POST['usuario'])) {    ?>
                    <span class="direct-chat-name pull-left"><?php echo $us['usuario']; ?></span>
                  <?php } ?>
                    <span class="direct-chat-timestamp pull-right"><?php echo $ch['fecha']; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <?php
                  $ima = "SELECT UsuImgNom from usuario where UsuID=".$sess;
                  $result = mysqli_query($conn, $ima);
                  if ($row2 = mysqli_fetch_array($result)) {
                    $dirImg = trim($row2[0]);
                  }
                  $dirFin = '/ServiAQP/usuario/img/' . $dirImg;
                  ?>
                  <img class="direct-chat-img" src="<?php echo $dirFin; ?>"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    <?php echo $ch['mensaje']; ?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <?php } elseif ($ch['de'] == $user) { ?>

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                  <?php
                  if(isset($_POST['usuario'])) {    ?>
                    <span class="direct-chat-name pull-right"><?php echo $us['usuario']; ?></span>
                  <?php } ?>
                    <span class="direct-chat-timestamp pull-left"><?php echo $ch['fecha']; ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <?php
                  $ima2 = "SELECT UsuImgNom from usuario where UsuID=".$user;
                  $result2 = mysqli_query($conn, $ima2);
                  if ($row3 = mysqli_fetch_array($result2)) {
                    $dirImg2 = trim($row3[0]);
                  }
                  $dirFin2 = '/ServiAQP/usuario/img/' . $dirImg2;
                  ?>
                  <img class="direct-chat-img" src="<?php echo $dirFin2; ?>"><!-- /.direct-chat-img -->
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
                        <input type="submit" name="enviar" class="btn btn-primary btn-flat"></button>
                      </span>
                </div>
              </form>

              <?php
              $aea="gaaaaaaa";
              if(isset($_POST['enviar'])) {
                
                if(isset($_POST['mensaje'])) {
                
                $mensaje = $_POST['mensaje'];
                }
                

                

                $de = $user;
                $para = $_GET['creador'];
                  
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


            </div>
            <!-- /.box-footer-->
            
        </div>
        <!-- /.col -->







              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
        
        <!-- /.control-sidebar-menu -->

        
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      
          <!-- /.form-group -->

         
          <!-- /.form-group -->

          
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>

<?php
include("../includes/footer.php")
?>

