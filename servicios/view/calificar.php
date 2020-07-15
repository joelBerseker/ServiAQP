<?php
    include("../../includes/data_base.php");
    $id         = $_POST['id'];
    $estrellas  = $_POST['estrellas'];
    $query2= "SELECT SerVal FROM servicio whre SerId=$id";
    $resultProduct= mysqli_query($conn, $query2);
    if ($row= mysqli_fetch_array($resultProduct)) 
    {
        $calificacion = trim($row[0]);
    }
    $query3="";
    if($calificacion==-1){
        $query3="UPDATE servicio SET SerVal= $estrellas WHERE SerID = 1";
    }
    else{
        $cal = intval('$estrellas');
        $cal2 = intval('$calificacion');
        $cal3=($cal+$cal2)/2;
        $query3="UPDATE servicio SET SerVal= $cal3 WHERE SerID = 1";
    }
    $envio =mysqli_query($conn,$query3);
    if($envio){
        echo "Calificacion Enviada";
    }else{
        echo "Error al enviar Calificacion";
    }
?>