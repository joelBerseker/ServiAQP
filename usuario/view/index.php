<?php
include('../../includes/sesion.php');
include("../../includes/data_base.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuario_tabla WHERE UsuID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre         = $row['UsuNom'];
        $correo         = $row['UsuCor'];
        $contraseña     = $row['UsuCon'];
        $estado         = $row['UsuEst'];
        $rol         = $row['RolNom'];
    }
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
                            <img src="/ServiAQP/usuario/img/<?php echo $row['UsuImgNom'] ?>" width="200px" id="imagenmuestra" alt="Img blob" class="imageny4" />

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
                    <div class="form-row form-group ">
                        <div class="col-4"><label>Rol:</label></div>
                        <div class="col">
                            <input readonly value="<?php echo $rol; ?>" class="form-control form-control-sm " type="text" name="correo" required></div>
                    </div>
                    <hr class="mt-2">
                    <div>
                        <button onclick="edit_usuario2(<?php echo $row['UsuID'] ?>)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Ascender a vendedor</button>
                        <button onclick="edit_usuario2(<?php echo $row['UsuID'] ?>)" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Editar</button>
                    </div>

                </div>
                <div class="card card-body mt-2 pb-0 pt-3">
                    <div class="form-row form-group ">
                        <a onclick="noti(<?php echo $row['UsuID'] ?>)" id="bnoti" class="btn btn-sm btn-primary btn-block btn-disabled disabled" style="color: white;"><em class="fas fa-bell rot_bell rot_bell2"></em> Notificaciones</a>
                        <a onclick="favo(<?php echo $row['UsuID'] ?>)" id="bfavo" class="btn btn-sm btn-primary btn-block" style="color: white;"><em class="fas fa-heart"></em> Favoritos</a>
                        <a onclick="adqu(<?php echo $row['UsuID'] ?>)" id="badqu" class="btn btn-sm btn-primary btn-block" style="color: white;"><em class="fas fa-bell rot_bell rot_bell2"></em> Adquiridos</a>
                        <a onclick="publ(<?php echo $row['UsuID'] ?>)" id="bpubl" class="btn btn-sm btn-primary btn-block" style="color: white;"><em class="fas fa-bell rot_bell rot_bell2"></em> Publicados</a>

                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <div class="card card-body" id="recargarusuario">

                    <?php

                    include('notificaciones.php');
                    ?>
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
<?php
include("../../includes/footer.php")
?>