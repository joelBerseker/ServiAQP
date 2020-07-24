<?php
$recurso="/subcategoria/save";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>

<?php
    if(isset($_POST['save_subcategoria'])){
        $nombre = $_POST['nombre'];//Cambiamos el valor de nombre con el recivido por post
        $descripcion = $_POST['descripcion'];//Cambiamos el valor de descripcion con el recivido por post
        $categoria =$_POST['categoria'];
        /*$pruebita = $_POST['imagenmuestra'];
        #$archivo_nombre=$_FILES['myFile']['name'];
        #$archivo_tipo = $_FILES['myFile']['type'];
        #$archivo_temp = $_FILES['myFile']['tmp_name'];
        #if($archivo_temp==null){
        #    $archivo_binario = (file_get_contents('../../image/objeto-sin-imagen.png'));
        #}else{
            $archivo_binario = (file_get_contents($archivo_temp));
        }*/
        $estado = $_POST['estado'];
        echo $nombre." ".$descripcion." ".$categoria." ".$estado;
        #$query = "INSERT INTO categoria (`CatNom`, `CatDes`, `CatImgNom`, `CatImpTip`, `CatImgArc`, `CatEst`) VALUES (?, ?, ?, ?, ?, ?)";
        $query = "INSERT INTO subcategoria (`SubCatNom`, `SubCatDes`, `SubCatCatId`, `SubCatEstReg`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn,$query);
        #$stmt->bind_param('sssssi',$nombre,$descripcion,$archivo_nombre, $archivo_tipo, $archivo_binario,$estado);
        $stmt->bind_param('ssii',$nombre,$descripcion,$categoria,$estado);
        if(!mysqli_stmt_execute($stmt)){
            echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
        }      
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../");
    }
    else{
        echo "No envio";
    }
?>