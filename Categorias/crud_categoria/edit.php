<?php
$recurso="/categoria/edit";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include("../../includes/data_base.php");
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM CATEGORIA WHERE CatId = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre         = $row['CatNom'];
        $description    = $row['CatDes'];
        $estado         = $row['CatEstReg'];
    }
}
if (isset($_POST['update'])) {
    $id             = $_GET['id'];
    $nombre         = $_POST['nombre'];
    $description    = $_POST['description'];
    $estado         = $_POST['estado'];
    $query = "UPDATE `CATEGORIA` SET `CatNom`='$nombre',`CatDes`='$description' ,`CatEstReg`=$estado WHERE `CatID`= $id ";
    $result = mysqli_query($conn, $query);
    header("Location: ../tabla.php");
} ?>

<form action="crud_categoria/edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="modal-body">
        <!--<div class="form-row form-group ">
                    <div class="col" align="center" >
                        <img src="<?= $dirEjec ?>/image/objeto-sin-imagen.png"  class="img-fluid"id="imagenmuestra" alt="Img blob" />
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
                    if ($estado == 1) {
                    ?>
                        <option value="1" selected> Activo </option>
                        <option value="0"> Inactivo </option>
                    <?php
                    } else {
                    ?>
                        <option value="1"> Activo </option>
                        <option value="0" selected> Inactivo </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-outline-success btn-sm" name="update">
            Actualizar
        </button>
    </div>
</form>