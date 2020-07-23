<?php
    
    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    $idServicio = $_POST['id'];
    $motivo = $_POST['descripcion'];
    $user   =$user['UsuID'];
    $queryE ="SELECT * FROM servicio_report WHERE SerRepDenUsuID = $user and SerRepSerID=$idServicio";
    $resultProduct = mysqli_query($conn, $queryE);
    $total = mysqli_num_rows($resultProduct);
    if($total==0){
        $sql ="INSERT INTO servicio_report( SerRepDenUsuID, SerRepSerID,SerRepMot) VALUES ($user,$idServicio,'$motivo')";
        $envio= mysqli_query($conn,$sql);
        if($envio){
            echo "Reporte Enviado";
        }else{
            echo "Error al enviar Reporte";
        }
    }else{
        echo "ya reporto este Servicio";
    }
    
?>