<?php
include('sesion.php');
include('data_base.php');
/* $conn = new mysqli("localhost","root","","notificaciones"); */
$sql = "UPDATE notificacion SET NotEst = 1 WHERE NotEst = 0 and NotUsuID = ".$user['UsuID']; 
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM notificacion WHERE NotUsuID=".$user['UsuID']." ORDER BY NotFecCre DESC limit 3";
$result = mysqli_query($conn, $sql);
$response='';
while($row=mysqli_fetch_array($result)) {
 $response = $response ."<div class=' pl-2 pr-2 pt-1'>
    <div class='card-body PT-0  notifi pt-2 pb-2 mb-1'>
        <p class='card-text mb-0 card-noti'>".
            $row["NotDes"].
        "</p>
        <hr class='mb-1 mt-2'>

        <p class='card-text '>
            <small class='text-muted '>".
                $row["NotFecCre"].
            "</small>
        </p>

    </div>
</div>";
}
echo $response ;
?>