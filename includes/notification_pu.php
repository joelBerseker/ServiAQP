<?php
include('sesion.php');
$conn1 = mysqli_connect("localhost", "root", "","serviaqp") or die("Error al conectar al servidor. Contactar con el administrador.");

set_time_limit(0);
$fecha_ac = $_POST['timestamp'];

// Inicio de la correccion --------------------------------------------------
$queryFechaDb    = "SELECT NotFecCre FROM notificacion ORDER BY NotFecCre DESC LIMIT 1";
$con = mysqli_query($conn1, $queryFechaDb);
$time = mysqli_fetch_array($con);
// Fin de la correccion -------------------------------------------------------

if ($fecha_ac == 0) {
    $ar["entre0"] = $fecha_ac;
    $fecha_ac = strtotime($time['NotFecCre']);
    
}
$fecha_bd = strtotime($time['NotFecCre']);
$ar["f_db"] = $fecha_bd;
$ar["f_ac"] = $fecha_ac;
if ($fecha_bd > $fecha_ac) {

    $query_datos       = "SELECT * FROM notificacion ORDER BY NotFecCre DESC LIMIT 1";
    $datos_query = mysqli_query($conn1, $query_datos);
    clearstatcache();
usleep(100000);
    while ($row = mysqli_fetch_array($datos_query)) {
        $ar["NotFecCre"]    = strtotime($row['NotFecCre']);
        $ar["NotDes"]      = $row['NotDes'];
    }
    $ar["actualizar"] = 1;
} else {
    $ar["NotFecCre"]    = $fecha_ac;
    $ar["actualizar"] = 0;
}

$dato_json   = json_encode($ar);
echo $dato_json;
?>