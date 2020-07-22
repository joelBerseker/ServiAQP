<?php
//include('../../includes/sesion.php');
include('../../includes/data_base.php');
$recurso = "/Usuario/edit";
//include("../../includes/acl_usuario_edit.php");

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuario WHERE UsuID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $idUsuario = $row['UsuID'];
        $nombre         = $row['UsuNom'];
        $correo_edit         = $row['UsuCor'];
        $contraseña     = $row['UsuCon'];
       
    }
}

if (isset($_POST['update'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $archivo_nombre=$_FILES['myFile']['name'];
    $explode= explode('.',$archivo_nombre);
    $tipo = array_pop($explode);
    $ruta = $_FILES['myFile']['tmp_name']; 
    $tipo = $_FILES['myFile']['type']; 
    $carpeta = "../img/";
    $rutaFinal = $carpeta.$archivo_nombre;
    move_uploaded_file($ruta,$rutaFinal);
   
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $mysqli = new mysqli($database_red, $database_nombre, $database_contraseña, $database_name);
    $stmt = $mysqli->prepare("UPDATE usuario SET `UsuNom`=?, `UsuCor`=?,`UsuCon`=?,`UsuImgNom`=?,`UsuImgTip`=? WHERE UsuID=?");
    /* BK: always check whether the prepare() succeeded */
    if ($stmt === false) {
        trigger_error($this->mysqli->error, E_USER_ERROR);
        return;
    }

    /* Bind our params */
    /* BK: variables must be bound in the same order as the params in your SQL.
        * Some people prefer PDO because it supports named parameter. */
    $stmt->bind_param('sssssi', $nombre, $correo, $contraseña, $archivo_nombre, $archivo_tipo, $id);

    /* Set our params */
    /* BK: No need to use escaping when using parameters, in fact, you must not, 
        * because you'll get literal '\' characters in your content. */
    /* Execute the prepared Statement */
    $status = $stmt->execute();
    /* BK: always check whether the execute() succeeded */
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
    }
    header("Location: ../view?id=".$id);
}
?>
<form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-row form-group ">
            <div class="col pb-2" align="center">
                <img src="/ServiAQP/usuario/img/<?php echo $row['UsuImgNom'] ?>" width="200px" id="imagenmuestra2" alt="Img blob" />
            </div>
        </div>
        <div class="form-row form-group ">
            <div class="col-4"><label>Imagen:</label></div>
            <div class="col">
                <input type="file" accept="image/* " class="form-control-file" name="myFile" id="imagen2" maxlength="256" placeholder="Imagen">
                <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
            </div>
        </div>
        <div class="form-row form-group ">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col">
                <input value="<?php echo $nombre; ?>" class="form-control form-control-sm " type="text" name="nombre" required></div>
        </div>
        <div class="form-row form-group ">
            <div class="col-4"><label>Correo:</label></div>
            <div class="col">
                <input value="<?php echo $correo_edit; ?>" class="form-control form-control-sm " type="text" name="correo" required></div>
        </div>
        
        <div class="form-row form-group ">
            <div class="col-4">
                <label>Contraseña:</label>
            </div>
            <div class="col">
                <input class="form-control form-control-sm " value="<?php echo $contraseña; ?>" type="password" name="contraseña" required>
            </div>
        </div>
      




        
    </div>
    <div class="modal-footer">
        <button class="btn btn-outline-success btn-sm" name="update">
            Actualizar
        </button>
    </div>
</form>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#imagenmuestra2').attr('src', e.target.result);
        }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imagen2").change(function() {
        readURL(this);
    });
</script>
