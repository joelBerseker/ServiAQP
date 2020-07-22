<?php
    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    $user       = $user['UsuID'];
    $servicio   = $_POST['servicio'];
    
    $queryE ="SELECT * FROM adquiridos WHERE AdqUsuID = $user and AdqSerID=$servicio";
    $resultProduct = mysqli_query($conn, $queryE);
    $total = mysqli_num_rows($resultProduct);
    if($total==0){
        $query= "INSERT INTO adquiridos (AdqUsuID, AdqSerID) VALUES ($user,$servicio)";
        $envio= mysqli_query($conn,$query);
        if($envio){
            echo "Acabas de Adquirir este Servicio";
        }else{
            echo "Error al adquiridos Servicios";
        }
    }else{
        echo "Ya adquiridos este Servicio";
    }
?>