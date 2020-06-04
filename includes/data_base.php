<?php

$database_red ="localhost";
$database_nombre="root";
$database_contraseña="";
$database_name="S4P";

$conn = mysqli_connect(
    $database_red,
    $database_nombre,
    $database_contraseña,
    $database_name
)or die("Error al conectar al servidor. Contactar con el administrador.");

/*

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'S4P'
)or die("Error al conectar al servidor");*/
?>