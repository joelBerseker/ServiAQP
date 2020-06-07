<?php
include("../../includes/global_variable.php");
//include("../../includes/sesion.php");
include("../../includes/data_base.php");
$recurso = "/Recurso/edit";
//include("../../includes/acl.php");

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM RECURSO WHERE RecId = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre         = $row['RecNom'];
        $description    = $row['RecDes'];
        $estado         = $row['RecEstReg'];
    }
}
if(isset($_POST['update'])){
    $id             = $_GET['id'];
    $nombre         = $_POST['nombre'];
    $description    = $_POST['description'];
    $estado         = $_POST['estado'];
    $query = "UPDATE `RECURSO` SET `RecNom`='$nombre',`RecDes`='$description' ,`RecEstReg`=$estado WHERE `RecID`= $id ";
    $result = mysqli_query($conn, $query);
    header("Location: ../");
}?>
<?php
include('../../includes/navbar.php');
$categoria = true;
$titulo_html = "Recurso";
include('../../includes/header.php');
include("../../includes/data_base.php");
?>
<div class="section">
<div class="section2">
    <div class="container pt-4"></div>
    <div class="row">
    <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label><b>EDITAR RECURSO</b></label>
                    </div>
                    <!--<div class="form-row form-group ">
                    <div class="col" align="center" >
                        <img src="<?=$dirEjec?>/image/objeto-sin-imagen.png"  class="img-fluid"id="imagenmuestra" alt="Img blob" />
                    </div>
                    </div>-->
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Nombre:</label></div>
                        <div class="col">
                            <input value="<?php echo $nombre; ?>" class="form-control form-control-sm " vtype="text" name="nombre" required></div>
                    </div>
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Descripción:</label></div>
                        <div class="col">
                            <input value="<?php echo $description; ?>" class="form-control form-control-sm " vtype="text" name="description" required></div>
                    </div>

                    <div class="form-row form-group ">
        <div class="col-4"><label>Estado:</label></div>
        <div class="col">
        <select name="estado" class="form-control form-control-sm">
        <?php
            if($estado==1){
        ?>
            <option value="1" selected> Activo </option>   
            <option value="0" > Inactivo </option>   
        <?php
            }else{
        ?>
            <option value="1" > Activo </option> 
            <option value="0" selected> Inactivo </option>
        <?php
            }
        ?>
		</select>
        </div>
    </div>
                    
                    <button class="btn btn-success btn-block" name="update">
                    Actualizar
                    </button>
                </form>
            </div>
        </div>
       
    
</div>
</div>
<?php
    include("../../includes/footer.php")
?>