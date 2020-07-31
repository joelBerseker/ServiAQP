<?php
include("../includes/sesion.php");
include("../includes/data_base.php");
include("../includes/global_variable.php");
include("../servicios/view/tiempo.php");
?>
<div class="box box-primary">
  <hr class="mt-3">
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <?php
    $usua = $user['UsuID'];

    $chats = mysqli_query($conn, "SELECT * FROM c_chats WHERE de = $usua OR para = $usua order by id_cch desc");
    if (mysqli_num_rows($chats) > 0) {
    ?>
      <div class="table-responsive mailbox-messages">
        <table class="table table-hover table-striped">
          <tbody>

            <?php

            while ($ch = mysqli_fetch_array($chats)) {

              if ($ch['de'] == $usua) {
                $var = $ch['para'];
              } elseif ($ch['para'] == $usua) {
                $var = $ch['de'];
              }
              $usere = mysqli_query($conn, "SELECT * FROM usuario WHERE UsuID = '$var'");
              $us = mysqli_fetch_array($usere);

              $chat = mysqli_query($conn, "SELECT * FROM chats WHERE id_cch = '" . $ch['id_cch'] . "' ORDER BY id_cha desc limit 1");
              $cha = mysqli_fetch_array($chat);

            ?>
              <tr>
                <td class="mailbox-star">
                  <?php if ($cha['leido'] == 0) { ?>
                    <i class="fa fa-star text-warning"></i>
                  <?php } else { ?>
                    <i class="fa fa-star text-secondary"></i>
                  <?php } ?>
                </td>

                <td class="mailbox-name"><a href="/ServiAQP/usuario/view/?id=<?php echo $usua; ?>&opcion=6&creador=<?php echo $var; ?>"><?php echo $us['UsuNom']; ?></a></td>
                <td class="mailbox-subject"><?php echo $cha['mensaje']; ?>
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date"><?php echo imprimirTiempo($cha['fecha']); ?></td>
              </tr>
            <?php } ?>



          </tbody>
        </table>
        <!-- /.table -->
      </div>
    <?php } else { ?>
      <p>No hay elementos</p>
    <?php } ?>
    <!-- /.mail-box-messages -->
  </div>
  <!-- /.box-body -->
</div>