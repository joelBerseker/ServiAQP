<?php
$recurso="/subcategoria/delete";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM SUBCATEGORIA WHERE SubCatId = $id";
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
