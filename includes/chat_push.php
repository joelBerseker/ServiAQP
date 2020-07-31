<?php
include('sesion.php');
$sess = $_POST['creador'];
$user = $user['UsuID'];

$conn1 = mysqli_connect("localhost", "root", "", "serviaqp") or die("Error al conectar al servidor. Contactar con el administrador.");

set_time_limit(0);
$fecha_ac = $_POST['timestamp2'];

$queryFechaDb    = "SELECT * FROM chats WHERE de = '$user' AND para = '$sess' OR de = '$sess' AND para = '$user' order by id_cha desc";
$con = mysqli_query($conn1, $queryFechaDb);
$time = mysqli_fetch_array($con);

if ($fecha_ac == 0) {
    $fecha_ac = $time['fecha'];
}
$ar["NotFecCre"]    = $fecha_ac;
$ar["actualizar"] = 0;
$fecha_bd = $time['fecha'];

if ($fecha_bd > $fecha_ac) {

    $ar["NotFecCre"]    = $fecha_bd;

    $ar["actualizar"] = 1;
}

$dato_json   = json_encode($ar);
echo $dato_json;
