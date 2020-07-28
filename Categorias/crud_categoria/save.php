<?php
$recurso="/categoria/save";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>

<?php
    if(isset($_POST['save_product'])){
        $nombre;//Inicializa el nombre.
        $descripcion;//Inicializa la descripcion
        echo $nombre." ".$descripcion;//Imprimimos valor actual        
        $nombre = $_POST['nombre'];//Cambiamos el valor de nombre con el recivido por post
        $descripcion = $_POST['descripcion'];//Cambiamos el valor de descripcion con el recivido por post
        echo $nombre." ".$descripcion;//Imprimimos los nuevos valores       
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
        #$query = "INSERT INTO categoria (`CatNom`, `CatDes`, `CatImgNom`, `CatImpTip`, `CatImgArc`, `CatEst`) VALUES (?, ?, ?, ?, ?, ?)";
        $query = "INSERT INTO categoria (`CatNom`, `CatDes`, `CatEstReg`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn,$query);
        #$stmt->bind_param('sssssi',$nombre,$descripcion,$archivo_nombre, $archivo_tipo, $archivo_binario,$estado);
        $stmt->bind_param('ssi',$nombre,$descripcion,$estado);
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