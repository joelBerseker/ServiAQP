<?php
include("../includes/sesion.php"); 
include("../includes/data_base.php"); 
    $mensaje = $_POST['mensaje'];
    $de = $user['UsuID'];
    $para = $_POST["creador"];
    $asd="SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'";
    $comprobar = mysqli_query($conn, "SELECT * FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
    $com = mysqli_fetch_array($comprobar);
    if(mysqli_num_rows($comprobar)  == 0) {
      $insert = mysqli_query($conn, "INSERT INTO c_chats (de,para) VALUES ('$de','$para')");
      $siguiente = mysqli_query($conn, "SELECT id_cch FROM c_chats WHERE de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
      $si = mysqli_fetch_array($siguiente);
      $insert2 = mysqli_query($conn,"INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$si['id_cch']."','$de','$para','$mensaje',now(),'0')");
      if($insert) {echo '<script>window.location="index.php?creador='.$para.'"</script>';}
    }
    else{
      $sentencia="INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')";
      echo $sentencia;
      $insert3 = mysqli_query($conn, "INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')");
        if($insert3) {
            echo "Mensaje Enviado";
        }
    }



?>