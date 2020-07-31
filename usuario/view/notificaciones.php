<?php
include("../../includes/data_base.php");
include('../../servicios/view/tiempo.php');
$id = $_GET['id'];
?>
<div id="div_noti">
    <hr class="mt-3">
    <?php
    $sql = "SELECT * FROM notificacion WHERE NotUsuID=" . $id . " ORDER BY NotFecCre DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <div class="card3 mb-3">
                <div class="row no-gutters">

                    <div class="card-body">

                        <p class="card-text"><?= $row["NotDes"] ?></p>
                        <hr class="mb-2">
                        <p class="card-text"><small class="text-muted"><?= imprimirTiempo($row["NotFecCre"]) ?></small></p>
                    </div>

                </div>
            </div>
        <?php
        }
    } else { ?>
    <p>No hay elementos</p>
    <?php } ?>
</div>