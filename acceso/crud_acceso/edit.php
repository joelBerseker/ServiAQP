<?php
include("../../includes/global_variable.php");
//include("../../includes/sesion.php");
include("../../includes/data_base.php");
$recurso = "/Acceso/edit";
//include("../../includes/acl.php");

?>
<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM acceso WHERE AccID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['AccNom'];
        $estado = $row['AccEstReg'];
        $rol = $row['AccRolId'];
        $recurso = $row['AccRecId'];
    }
}
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombrex2'];
    $estado = $_POST['estadox2'];
    $rol = $_POST['rolx2'];
    $recurso = $_POST['recursox2'];
    $query = "UPDATE acceso SET AccNom = '$nombre', AccEstReg = '$estado', AccRolId = '$rol', AccRecId = '$recurso' WHERE AccId = $id";
    $result = mysqli_query($conn, $query);

    $_SESSION['message'] = 'Acceso Edited Succesfully';
    $_SESSION['message_type'] = 'info';
    header("Location: ../index.php");
}
?>
<?php
include('../../includes/navbar.php');
$categoria = true;
$titulo_html = "CAcceso";
include('../../includes/header.php');
include("../../includes/data_base.php");
?>
<br>
<br>
<div class="section2">
    <div class="container pt-4"></div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <label><b>EDITAR ACCESO</b></label>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-4"><label>Nombre:</label></div>
                        <div class="col">
                            <input type="text" name="nombrex2" class="form-control form-control-sm" value="<?php echo $nombre; ?>" autofocus></div>
                    </div>



                    <div class="form-row form-group ">
                        <div class="col-4"><label>Estado:</label></div>
                        <div class="col">
                            <select name="estadox2" class="form-control form-control-sm">
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
                        <div class="col-4"><label>Rol:</label></div>
                        <div class="col">

                    <?php
                    $consulta_rol = "SELECT RolID, RolNom FROM rol WHERE RolID = '$rol'";


                    $querya = mysqli_query($conn, $consulta_rol);
                    ?>
                    <select name="rolx2" class="form-control form-control-sm">
                        <?php
                        while ($datosa = mysqli_fetch_array($querya)) {
                            ?>
                            <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
                        <?php
                            }    
                         
                        ?>
                    </select></div></div>
                    <div class="form-group form-row">
                        <div class="col-4"><label>Recurso:</label></div>
                        <div class="col">
                    <?php
                    $consulta_recurso = "SELECT RecID, RecNom FROM recurso WHERE RecID = '$recurso'";

                    $queryb = mysqli_query($conn, $consulta_recurso);
                    ?>
                    <select name="recursox2" class="form-control form-control-sm">
                        <?php
                        while ($datosb = mysqli_fetch_array($queryb)) {
                            ?>
                            <option value="<?php echo $datosb['RecID'] ?>"> <?php echo $datosb['RecNom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select></div></div>
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