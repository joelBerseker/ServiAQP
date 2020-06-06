<?php
include('../includes/global_variable.php');
session_start();
session_unset();
session_destroy();
header('Location:'. $dirEjec.'/');
?>
