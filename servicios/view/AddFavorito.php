<?php
    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    $user       = $user['UsuID'];
    $servicio   = $_POST['servicio'];
    
    $queryE ="SELECT * FROM favoritos WHERE FavUsuID = $user and FavSerID=$servicio";
    $resultProduct = mysqli_query($conn, $queryE);
    $total = mysqli_num_rows($resultProduct);
    if($total==0){
        $query= "INSERT INTO favoritos (FavUsuID, FavSerID) VALUES ($user,$servicio)";
        $envio= mysqli_query($conn,$query);
        if($envio){
            echo "Añadido a favoritos";
        }else{
            echo "Error al añadir a Favoritos";
        }
    }else{
        echo "Existe ya en tus favoritos";
    }
?>