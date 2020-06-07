<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Acceso/delete";
//include("../../includes/acl.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM Acceso WHERE AccId = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo  "DELETE FROM Acceso WHERE AccId = $id ";
        die("Query Fallo");
    }
    header("Location: ../");
}
?>
