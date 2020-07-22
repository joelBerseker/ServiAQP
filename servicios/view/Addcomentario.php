<?php

    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    $id         = $_POST['id'];
    $comentario  = $_POST['comentario'];
    $user       =$user['UsuID'];
    $query= "INSERT INTO serviciocomentario (SerComSerID, SerComUsuID,SerMenMen) VALUES ($id,$user,'$comentario')";
    $envio= mysqli_query($conn,$query);
    if($envio){
        echo "Comentario Enviada";
    }else{
        echo "Error al enviar Comentario";
    }

?>