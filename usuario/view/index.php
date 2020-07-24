<?php
$recurso="/usuario/view";
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include('../../includes/data_base.php');
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
            <div class="col-12 col-lg-4 mx-auto">
                <div class="card card-body">
                    <div class="form-row form-group ">

                        <div class="col pb-2 pt-2" align="center">

                            <div class="imageny6" style="background-image:url('/ServiAQP/usuario/img/<?php echo $row['UsuImgNom'] ?>');">
                            </div>
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
                        <?php if ($rol == "Comprador") { ?>

                            <button onclick="edit_usuario2(<?php echo $row['UsuID'] ?>)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ascenderModal" data-whatever="@mdo">Ascender a vendedor</button>
                        <?php } ?>
                        <button onclick="edit_usuario2(<?php echo $row['UsuID'] ?>)" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Editar</button>
                    </div>

                </div>

            </div>
            <div class="col-12 col-lg-8 mt-3 mt-lg-0 mx-auto">

                <div class="card card-body">
                    <div class=" ">
                        <?php
                        $m_opci = 0;
                        if (!empty($_GET['opcion'])) :
                            $m_opci = $_GET['opcion'];
                        endif;

                        ?>

                        <a onclick="noti(<?php echo $row['UsuID'] ?>)" id="bnoti" class="btn boton_menu <?php if ($m_opci == 1 || $m_opci == 0) echo "bm_select" ?>">Notificaciones</a>
                        <a onclick="favo(<?php echo $row['UsuID'] ?>)" id="bfavo" class="btn boton_menu <?php if ($m_opci == 2) echo "bm_select" ?>">Favoritos</a>
                        <a onclick="adqu(<?php echo $row['UsuID'] ?>)" id="badqu" class="btn boton_menu <?php if ($m_opci == 3) echo "bm_select" ?>">Adquiridos</a>
                        <a onclick="publ(<?php echo $row['UsuID'] ?>)" id="bpubl" class="btn boton_menu <?php if ($m_opci == 4) echo "bm_select" ?>">Publicados</a>


                    </div>
                    <div id="recargarusuario">
                        <?php

                        switch ($m_opci) {
                            case 1:
                                include('notificaciones.php');
                                break;
                            case 2:
                                include('favoritos.php');
                                break;
                            case 3:
                                include('adquiridos.php');
                                break;
                            case 4:
                                include('publicados.php');
                                break;
                            default:
                                include('notificaciones.php');
                                break;
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
<?php
include("ascender.php");
include("../../includes/footer.php");
?>