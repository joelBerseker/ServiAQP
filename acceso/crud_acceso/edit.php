<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM acceso WHERE id_acceso = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $estado = $row['estado'];
            $rol = $row['id_rol'];
            $recurso = $row['id_recurso'];
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombrex2'];
        $estado =$_POST['estadox2'];
        $rol = $_POST['rolx2'];
        $recurso =$_POST['recursox2'];
        $query = "UPDATE acceso SET nombre = '$nombre', estado = '$estado', id_rol = '$rol', id_recurso = '$recurso' WHERE id_acceso = $id";
        $result = mysqli_query($conn,$query);

        $_SESSION['message'] = 'Acceso Edited Succesfully';
        $_SESSION['message_type']= 'info';
        header("Location: ../index.php");
        
    }
?>
<?php
	include('../includes/header.php')
?>
<div class="container p-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
						<input type="text" name="nombrex2" class="form-control" value="<?php echo $nombre;?>" placeholder="Nombre" autofocus>
					</div>
					<div class="form-group">
                        <?php
                        if($estado==1){
                        ?>
                        Activo
                        <input type="radio" name="estadox2" value="1" class="form-control" checked=""> <br>
                        Inactivo
                        <input type="radio" name="estadox2" value="0" class="form-control"> <br>
                        <?php
                        }else{
                        ?>
                        Activo
                        <input type="radio" name="estadox2" value="1" class="form-control" > <br>
                        Inactivo
                        <input type="radio" name="estadox2" value="0" class="form-control" checked=""> <br>
                        <?php
                        }
                        ?>
                        Seleccione el rol <br>
                    
                    <?php
                    $querya=mysqli_query($conn,"SELECT id_rol, nombre FROM rol");
                    ?>
                    <select name="rolx2">
                        <?php
                        while($datosa = mysqli_fetch_array($querya)){ 
                        ?>
                        <option value="<?php echo $datosa['id_rol'] ?>"> <?php echo $datosa['nombre'] ?> </option>
                        <?php
                        }
                        ?>
                    </select><br>
                    Seleccione el recurso <br>
                    <?php
                    $queryb=mysqli_query($conn,"SELECT recurso_id, nombre FROM recurso");
                    ?>
                    <select name="recursox2">
                        <?php
                        while($datosb = mysqli_fetch_array($queryb)){ 
                        ?>
                        <option value="<?php echo $datosb['recurso_id'] ?>"> <?php echo $datosb['nombre'] ?> </option>
                        <?php
                        }
                        ?>
                    </select><br>
                    </div>
					<button class="btn btn-success btn-block" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>


<?php
	include("../includes/footer.php")
?>