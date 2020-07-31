<?php 
include("../servicios/view/tiempo.php");
?>
<div class="box-body">
  <!-- Conversations are loaded here -->
  <div class="direct-chat-messages">
    <?php
    $sergio = "gaaa";
    if (isset($_POST['creador'])) {
      include("../includes/sesion.php");
      include("../includes/data_base.php");
      $sess = $_POST['creador'];
      $user = $user['UsuID'];
    }
    $chats = mysqli_query($conn, "SELECT * FROM chats WHERE de = '$user' AND para = '$sess' OR de = '$sess' AND para = '$user' order by id_cha");
    while ($ch = mysqli_fetch_array($chats)) {
      if ($ch['de'] == $user) {
        $var = $user;
      } else {
        $var = $sess;
      }
      $usere = mysqli_query($conn, "SELECT * FROM usuario WHERE UsuID = '$var'");
      $us = mysqli_fetch_array($usere);
    ?>
      <?php
      if ($ch['para'] == $user) { ?>
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-info clearfix">
            <?php
            if (isset($_POST['usuario'])) {    ?>
              <span class="direct-chat-name pull-left"><?php echo $us['usuario']; ?></span>
            <?php } ?>
            <span class="direct-chat-timestamp pull-right"><?php echo imprimirTiempo($ch['fecha']); ?></span>
          </div>
          <!-- /.direct-chat-info -->
          <?php
          $ima = "SELECT UsuImgNom from usuario where UsuID=" . $sess;
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
            if (isset($_POST['usuario'])) {    ?>
              <span class="direct-chat-name pull-right"><?php echo $us['usuario']; ?></span>
            <?php } ?>
            <span class="direct-chat-timestamp pull-left"><?php echo imprimirTiempo($ch['fecha']); ?></span>
          </div>
          <!-- /.direct-chat-info -->
          <?php
          $ima2 = "SELECT UsuImgNom from usuario where UsuID=" . $user;
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
<script>
    $('.direct-chat-messages').scrollTop( $('.direct-chat-messages').prop('scrollHeight') );   
</script>