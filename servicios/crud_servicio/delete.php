<?php
$recurso="/servicio/delete";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>
<?php
    $id = $_POST['id'];
    $sql = "SELECT * FROM `servicio_img` where SerImgSerId = $id";
    $result1 = mysqli_query($conn,$sql);
    $dir = "../img/";
    while ($row = mysqli_fetch_array($result1)){
        $dirfin = $dir.$row['SerImgNom'];
        unlink($dirfin);      
    }
    $query  = "DELETE FROM servicio WHERE SerID = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo $query;
        die("Query Fallo");
    }
    echo 1;
?>  


