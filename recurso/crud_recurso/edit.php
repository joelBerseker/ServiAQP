<?php 
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       
        $query = "SELECT * FROM recurso WHERE recurso_id = $id";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)== 1 ){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $estado = $row['estado'];
           
        }
        
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombrex2'];
        $estado =$_POST['estadox2'];
        $query = "UPDATE recurso SET nombre = '$nombre', estado = '$estado' WHERE recurso_id = $id";
        $result = mysqli_query($conn,$query);

        $_SESSION['message'] = 'Recurso Edited Succesfully';
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