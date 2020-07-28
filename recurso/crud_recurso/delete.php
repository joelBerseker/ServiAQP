<?php
$recurso="/recurso/delete";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM RECURSO WHERE RecId = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo  "DELETE FROM RECURSO WHERE RecId = $id ";
        die("Query Fallo");
    }
    header("Location: ../");
}
?>
