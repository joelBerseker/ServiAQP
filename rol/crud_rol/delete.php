<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/rol/delete";
//include("../../includes/acl.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM ROL WHERE RolId = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo  "DELETE FROM ROL WHERE RolId = $id ";
        die("Query Fallo");
    }
    header("Location: ../");
}
?>
