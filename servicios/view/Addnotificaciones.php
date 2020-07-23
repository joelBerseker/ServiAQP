<?php
    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    $idServicio = $_POST['id'];
    $motivo = $_POST['nombre'];
    $descripcion=$_POST['preguntas'];
    $user1   =$user['UsuID'];
    $tipo   =$_POST['usuarios'];
    if($tipo=="favoritos" || $tipo=="ambos"){
        $query = "SELECT FavUsuID FROM favoritos WHERE FavEstReg = 1 and FavSerID =".$idServicio." and FavUsuID <> ".$user1;
        $resultProduct = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($resultProduct)) {
            $para= $row['FavUsuID'];
            $sql ="INSERT INTO notificacion ( NotDes,NotSerID, NotEnvUsuID, NotMot, NotUsuId) 
            values ('$descripcion',$idServicio,$user1,'$motivo',$para)";
            mysqli_query($conn, $sql);
        }


    }if($tipo=="adquiridos" || $tipo=="ambos"){
        $query = "SELECT AdqUsuID FROM adquiridos WHERE AdqEstReg = 1 and AdqSerID =".$idServicio." and AdqUsuID <> ".$user1;
        $resultProduct = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($resultProduct)) {
            $para= $row['AdqUsuID'];
            $sql ="INSERT INTO notificacion ( NotDes,NotSerID, NotEnvUsuID, NotMot, NotUsuId) 
            values ('$descripcion',$idServicio,$user1,'$motivo',$para)";
            mysqli_query($conn, $sql);
        }
    }
    echo "Notificaciones Enviadas";
?>