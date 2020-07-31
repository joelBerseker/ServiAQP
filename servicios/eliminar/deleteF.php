<?php
    $recurso="/servicio/delete";
    include("../../includes/sesion.php");
    include("../../includes/global_variable.php");

    include('../../includes/data_base.php');
    $id = $_POST['id'];
    $query = "DELETE FROM favoritos WHERE FavID = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo $query;
        die("Query Fallo");
    }
    echo 1;
?>  


