<?php
    
    include("../../includes/sesion.php");
    include("../../includes/data_base.php");
    
    $user           = $user['UsuID'];;
    $nombre         = $_POST['nombre'];
    $precio         = $_POST['precio'];
    $descripcion    = $_POST['descripcion'];
    $preguntas      = nl2br($_POST['preguntas']);
    $categoria      = $_POST['categoria'];
    $subcategoria   = $_POST['subcategoria'];
    
    $query ="INSERT INTO `servicio`( `SerUsuID`, `SerCatID`, `SerSubCatID`, `SerPreFre`, `SerDes`, `SerNom`, `SerPre`) 
        VALUES ($user,$categoria,$subcategoria,'$preguntas','$descripcion','$nombre',$precio)";
    if(mysqli_query($conn,$query)){
        $num =count($_FILES['imagenes']['size']);
        $query2= "SELECT MAX(SerID) FROM servicio";
        $resultProduct= mysqli_query($conn, $query2);
        if ($row= mysqli_fetch_array($resultProduct)) 
        {
            $idServicio = trim($row[0]);
        }  
        
        $nombres =$_FILES['imagenes']['name'];
        for ($i=0; $i <$num ; $i++) { 
            $NomArchivo = $nombres[$i];
            $explode= explode('.',$NomArchivo);
            $tipo = array_pop($explode);
            $ruta = $_FILES['imagenes']['tmp_name'][$i]; 
            $tipo = $_FILES['imagenes']['type'][$i]; 
            $carpeta = "../img/";
            $rutaFinal = $carpeta.$NomArchivo;
            move_uploaded_file($ruta,$rutaFinal);
            $queryIm="INSERT INTO `servicio_img`(`SerImgSerId`, `SerImgNom`, `SerImgTip`)
             VALUES ($idServicio,'$NomArchivo','$tipo')";
            mysqli_query($conn,$queryIm);
        }
        echo "Envio correcto de Servicio";
    }else{
        echo "Error al ingresar el Servicio";
    }
?>