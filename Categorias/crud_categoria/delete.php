<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso="/Categoria/delete";
//include("../../includes/acl.php");
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM CATEGORIA WHERE CatId = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo  "Query Realizado: "."DELETE FROM CATEGORIA WHERE CatId = $id ";
            die("Query Fallo");
        }
        header("Location: ../");
    }else{
        echo "No envio datos de ID";
    }
?>