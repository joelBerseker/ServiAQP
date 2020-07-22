<?php
include("../../includes/data_base.php");
$id = $_GET['id'];
?>
<div id="div_noti">
    <h5>Notificaciones</h5>
    <hr class="mt-1">
    <?php
    $sql = "SELECT * FROM notificacion WHERE NotUsuID=" . $id . " ORDER BY NotFecCre DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="card3 mb-3">
            <div class="row no-gutters">

                <div class="card-body">

                    <p class="card-text"><?= $row["NotDes"] ?></p>
                    <hr class="mb-2">
                    <p class="card-text"><small class="text-muted"><?= $row["NotFecCre"] ?></small></p>
                </div>

            </div>
        </div>
    <?php
    }
    ?>
</div>