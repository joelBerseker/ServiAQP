<?php
include('db.php');
if(isset($_POST['save_acceso'])){
    $nombre = $_POST['nombre'];
    $id_rol = $_POST['rol'];
    $id_recurso = $_POST['recurso'];
    $query = "INSERT INTO acceso(nombre, id_rol, id_recurso) VALUES ('$nombre','$id_rol','$id_recurso')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Acceso Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../index.php");
}
else{
    echo "No envio";
}

?>
