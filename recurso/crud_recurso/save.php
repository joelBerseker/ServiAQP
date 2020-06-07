<?php
include('db.php');
if(isset($_POST['save_recurso'])){
    $nombre = $_POST['nombre'];
    
    $query = "INSERT INTO recurso(nombre) VALUES ('$nombre')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }   

    $_SESSION['message'] = 'Recurso Saved Succesfully';
    $_SESSION['message_type']= 'success';
    header("Location: ../index.php");
}
else{
    echo "No envio";
}

?>
