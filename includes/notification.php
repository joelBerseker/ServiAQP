<?php
include('sesion.php');
include('data_base.php');
$sql = "UPDATE notificacion SET NotEst = 1 WHERE NotEst = 0 and NotUsuID = " . $user['UsuID'];
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM notificacion WHERE NotUsuID=" . $user['UsuID'] . " ORDER BY NotFecCre DESC limit 3";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class=' pl-2 pr-2 pt-1'>
            <div class='card-body PT-0  notifi pt-2 pb-2 mb-1'>
                <p class='card-text mb-0 card-noti'>
                    <?=$row["NotDes"]?>
                </p>
                <hr class='mb-1 mt-2'>

                <p class='card-text '>
                    <small class='text-muted '>
                        <?=$row["NotFecCre"]?>
                    </small>
                </p>

            </div>
        </div>;
    <?php
    }
} else { ?>
    <p style="color: white; font-size: 14px;" align='center' class="mt-2 mb-2">No hay elementos</p>
<?php }
?>