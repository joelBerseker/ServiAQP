<?php
$recurso="/subcategoria/edit";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM SUBCATEGORIA WHERE SubCatId = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['SubCatNom'];
        $estado = $row['SubCatEstReg'];
        $descripcion = $row['SubCatDes'];
        $categoria = $row['SubCatCatId'];
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $query = "UPDATE SUBCATEGORIA SET SubCatNom = '$nombre', SubCatEstReg = '$estado', SubCatCatId = '$categoria', SubCatDes = '$descripcion' WHERE SubCatId = $id";
    $result = mysqli_query($conn, $query);
    echo $query . "\n" . $result;
    header("Location: ../");
}
?>
<form action="crud_subcategoria/edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
    <div class="modal-body">
        <div class="form-group form-row">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col">
                <input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo $nombre; ?>" autofocus required></div>
        </div>
        <div class="form-group form-row">
            <div class="col-4"><label>Descripcion:</label></div>
            <div class="col">
                <input type="text" name="descripcion" class="form-control form-control-sm" value="<?php echo $descripcion; ?>" autofocus required></div>
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
        <div class="form-group form-row">
            <div class="col-4"><label>Categoria:</label></div>
            <div class="col">

                <?php
                $consulta_rol = "SELECT CatID, CatNom FROM CATEGORIA WHERE CatId = '$id'";
                $querya = mysqli_query($conn, $consulta_rol);
                ?>
                <select name="categoria" class="form-control form-control-sm">
                    <?php
                    while ($datosa = mysqli_fetch_array($querya)) {
                        if ($categoria == $datosa['CatId']) {
                    ?>
                            <option value="<?php echo $datosa['CatID'] ?>" selected> <?php echo $datosa['CatNom'] ?> </option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $datosa['CatID'] ?>"> <?php echo $datosa['CatNom'] ?> </option>
                    <?php
                        }
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
