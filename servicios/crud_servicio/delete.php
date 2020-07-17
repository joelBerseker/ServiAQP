<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Acceso/delete";
//include("../../includes/acl.php");
?>
<?php
    $id = $_POST['id'];
    $query = "DELETE FROM servicio WHERE SerID = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo  "DELETE FROM Acceso WHERE AccId = $id ";
        die("Query Fallo");
    }
    echo 1;
?>  


