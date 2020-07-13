<?php
include('sesion.php');
$conn1 = mysqli_connect("localhost", "root", "","serviaqp") or die("Error al conectar al servidor. Contactar con el administrador.");

set_time_limit(0);
$fecha_ac = $_POST['timestamp'];

$queryFechaDb    = "SELECT NotFecCre FROM notificacion WHERE NotUsuID=".$user['UsuID']." ORDER BY NotFecCre DESC LIMIT 1";
$con = mysqli_query($conn1, $queryFechaDb);
$time = mysqli_fetch_array($con);

if ($fecha_ac == 0) {
    $fecha_ac = $time['NotFecCre'];  
}
$ar["NotFecCre"]    = $fecha_ac;
$ar["actualizar"] = 0;
$fecha_bd = $time['NotFecCre'];

if ($fecha_bd > $fecha_ac) {
    $query_datos       = "SELECT * FROM notificacion WHERE NotUsuID=".$user['UsuID']." ORDER BY NotFecCre DESC LIMIT 1";
    $datos_query = mysqli_query($conn1, $query_datos);
    clearstatcache();
    usleep(100000);
    while ($row = mysqli_fetch_array($datos_query)) {
        $ar["NotFecCre"]    = $row['NotFecCre'];
        $ar["NotDes"]      = $row['NotDes'];
        $ar["NotID"]      = $row['NotID'];
    }
    $ar["actualizar"] = 1;
}

$dato_json   = json_encode($ar);
echo $dato_json;
?>