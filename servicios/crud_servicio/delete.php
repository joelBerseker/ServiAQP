<?php
$recurso="/servicio/delete";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>
<?php
    $id = $_POST['id'];
    $query = "DELETE FROM servicio WHERE SerID = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo $query;
        die("Query Fallo");
    }
    echo 1;
?>  


