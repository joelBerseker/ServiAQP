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
    $mysqli = new mysqli($database_red, $database_nombre, $database_contraseña, $database_name);
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
    <div class="container pt-4">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card card-body">
                    <div class="form-row form-group ">

                        <div class="col pb-2 pt-2" align="center">
                            <img src="../mostrar.php?id=<?php echo $row['UsuID'] ?>" width="200px" id="imagenmuestra" alt="Img blob" class="imageny4" />

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
                <div class="card card-body mt-2 pb-0 pt-3">
                    <div class="form-row form-group ">
                        <a onclick="favo()" class="btn btn-primary btn-block" style="color: white;"><em class="fas fa-heart"></em> Favoritos</a>
                        <a onclick="noti()" class="btn btn-primary btn-block" style="color: white;"><em class="fas fa-bell rot_bell rot_bell2"></em> Notificaciones</a>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <div class="card card-body">
                    <div id="div_favo">
                        <h5>Favoritos</h5>
                        <hr class="mt-1">
                        <div class="card3 mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <hr>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <hr class="mb-2">
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div_noti">
                        <h5>Notificaciones</h5>
                        <hr class="mt-1">
                        <?php
                        $sql = "SELECT * FROM notificacion WHERE NotUsuID=" . $user['UsuID'] . " ORDER BY NotFecCre DESC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="card3 mb-3">
                                <div class="row no-gutters">

                                    <div class="card-body">

                                        <p class="card-text"><?=$row["NotDes"]?></p>
                                        <hr class="mb-2">
                                        <p class="card-text"><small class="text-muted"><?=$row["NotFecCre"]?></small></p>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal_body_edit">
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
    function noti() {
        $('#div_favo').hide();
        $('#div_noti').show();
    }

    function favo() {
        $('#div_noti').hide();
        $('#div_favo').show();
    }

    window.onload = des;

    function des() {
        $var = getQueryVariable('opcion');
        if ($var == 0) {
            $('#div_noti').hide();
            $('#div_favo').show();
        } else {
            $('#div_favo').hide();
            $('#div_noti').show();
        }
    }

    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
    }
</script>
<?php
include("../../includes/footer.php")
?>