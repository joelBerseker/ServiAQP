<?php
include('../../includes/sesion.php');
include("../../includes/data_base.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuario WHERE UsuID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre         = $row['UsuNom'];
        $correo         = $row['UsuCor'];
        $contraseña     = $row['UsuCon'];
        $estado         = $row['UsuEst'];
        $id_rol         = $row['UsuRolID'];
    }
}
if (isset($_POST['update'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $estado = $_POST['estado'];
    $id_rol = $_POST['rol'];
    $archivo_nombre = $_FILES['myFile']['name'];
    $archivo_tipo = $_FILES['myFile']['type'];
    $archivo_temp = $_FILES['myFile']['tmp_name'];
    $archivo_binario = (file_get_contents($archivo_temp));
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $mysqli = new mysqli($database_red,$database_nombre,$database_contraseña,$database_name);
    $stmt = $mysqli->prepare("UPDATE usuario SET `UsuNom`=?, `UsuCor`=?,`UsuCon`=?,`UsuImgNom`=?,`UsuImgTip`=? ,`UsuImgArc`=?,`UsuRolID`=?,`UsuEst`=? WHERE UsuID=?");
    /* BK: always check whether the prepare() succeeded */
    if ($stmt === false) {
        trigger_error($this->mysqli->error, E_USER_ERROR);
        return;
    }

    /* Bind our params */
    /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
    $stmt->bind_param('ssssssiii', $nombre, $correo, $contraseña, $archivo_nombre, $archivo_tipo, $archivo_binario, $id_rol, $estado, $id);

    /* Set our params */
    /* BK: No need to use escaping when using parameters, in fact, you must not, 
        * because you'll get literal '\' characters in your content. */
    /* Execute the prepared Statement */
    $status = $stmt->execute();
    /* BK: always check whether the execute() succeeded */
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
    }
    header("Location: ../");
}

?>

<?php
include('../../includes/navbar.php');
$titulo_html = "Ver Usuario";
include('../../includes/header.php');
include("../../includes/data_base.php");
?>
<div class="section">
    <div class="container pt-4"></div>
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card card-body">
                <div class="form-row form-group ">
                   
                    <div class="col" align="center">
                        <img src="../mostrar.php?id=<?php echo $row['UsuID'] ?>" width="200px" id="imagenmuestra" alt="Img blob" />

                    </div>
                </div>
                <div class="form-row form-group ">
                    <div class="col-4"><label>Nombre:</label></div>
                    <div class="col">
                        <input readonly value="<?php echo $nombre; ?>" class="form-control form-control-sm " vtype="text" name="nombre" required></div>
                </div>
                <div class="form-row form-group ">
                    <div class="col-4"><label>Correo:</label></div>
                    <div class="col">
                        <input readonly value="<?php echo $correo; ?>" class="form-control form-control-sm " type="text" name="correo" required></div>
                </div>
                <a class="btn btn-primary btn-block" href="../crud_usuario/edit.php?id=<?php echo $row['UsuID'] ?>" name="update">Editar</a>
            </div>
        </div>
    </div>
</div>

<?php
include("../../includes/footer.php")
?>