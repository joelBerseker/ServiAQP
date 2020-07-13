<?php
include("../../includes/sesion.php");
include("../../includes/data_base.php");

include("../../includes/global_variable.php");
?>
<?php
function imprimirTiempo($time)
{
    date_default_timezone_set('America/Lima');
    $start_date = new DateTime($time);
    $since_start = $start_date->diff(new DateTime(date("Y-m-d") . " " . date("H:i:s")));
    echo "Hace ";
    if ($since_start->y == 0) {
        if ($since_start->m == 0) {
            if ($since_start->d == 0) {
                if ($since_start->h == 0) {
                    if ($since_start->i == 0) {
                        if ($since_start->s == 0) {
                            echo $since_start->s . ' segundos';
                        } else {
                            if ($since_start->s == 1) {
                                echo $since_start->s . ' segundo';
                            } else {
                                echo $since_start->s . ' segundos';
                            }
                        }
                    } else {
                        if ($since_start->i == 1) {
                            echo $since_start->i . ' minuto';
                        } else {
                            echo $since_start->i . ' minutos';
                        }
                    }
                } else {
                    if ($since_start->h == 1) {
                        echo $since_start->h . ' hora';
                    } else {
                        echo $since_start->h . ' horas';
                    }
                }
            } else {
                if ($since_start->d == 1) {
                    echo $since_start->d . ' día';
                } else {
                    echo $since_start->d . ' días';
                }
            }
        } else {
            if ($since_start->m == 1) {
                echo $since_start->m . ' mes';
            } else {
                echo $since_start->m . ' meses';
            }
        }
    } else {
        if ($since_start->y == 1) {
            echo $since_start->y . ' año';
        } else {
            echo $since_start->y . ' años';
        }
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuario_producto WHERE UsuProID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre                = $row['UsuProNom'];
        $product             = $row['UsuProProID'];
        $description        = $row['UsuProDes'];
        $precio             = $row['UsuProPre'];
        $estado                = $row['usuProEst'];

        $query2 = "SELECT ProNom FROM producto WHERE ProID = $product";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_array($result2);
            $nombreProducto = $row2['ProNom'];
        }
    }
}
if (isset($_POST['update_comentar'])) {
    $correa     =     $user['UsuCor'];
    $queryUser = "SELECT UsuID FROM usuario WHERE UsuCor = '$correa'";
    $resultUser = mysqli_query($conn, $queryUser);
    if (mysqli_num_rows($resultUser) == 1) {
        $rowUser                = mysqli_fetch_array($resultUser);
        $idUser                 = $rowUser['UsuID'];
        $usuario                =   $idUser;
        $id                  =   $_GET['id'];
        $comentario         =   $_POST['comentario'];
        $query = "INSERT INTO usuario_mensaje (`UsuMenUsuProID`,`UsuMenUsuID`, `UsuMenDes`) VALUES (?,?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        $stmt->bind_param('iis', $id, $usuario, $comentario);

        if (!mysqli_stmt_execute($stmt)) {
            echo "Chanfle, hubo un problema y no se guardo el archivo. " . mysqli_stmt_error($stmt) . "<br/>";
        }

        mysqli_stmt_close($stmt);
        header("Location: ../view?id=$id");
    }else{
        header("Location: $dirEjec/Errores/?m=jodete");
    }
}

?>

<?php 
include('../../includes/navbar.php');
$titulo_html = "Producto";
include('../../includes/header.php');
include("../../includes/data_base.php");
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="border-radius: 0px; margin-bottom: 0px!important; padding-left: 48px;">
        <li class="breadcrumb-item"><a href="<?php echo $dirEjec?>">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Vista de juego</li>

    </ol>

</nav>
<div class="section2">
    <div class="container p-4">
        <div class="row">
            <div class="col-6">

                <div class="card">
                    <div class="img-animtion">
                        <img class="card-img-top" src="../mostrar.php?id=<?php echo $product; ?>" alt="Imagen del autor del comentario" style="width: 100%;" />

                    </div>
                    <div class="card-body text-left">
                        <h4 class="card-title text-center mb-4 "><?php echo $nombre ?></h4>
                        <div class="form-row form-group ">
                            <div class="col-4"><label><b>Descripcion:</b></label></div>
                            <div class="col">
                            <label><?php echo $description ?><label></div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col-4"><label><b> Producto:</b></label></div>
                            <div class="col">
                            <label><?php echo $nombreProducto ?><label></div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col-4">
                                <label><b> Precio:</b></label>
                            </div>
                            <div class="col">
                            <label><?php echo $precio; ?></label>
                            </div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col-4">
                                <label ><b>Descripcion del producto:</b></label>
                            </div>
                            <div class="col">
                            <label><?php echo $precio; ?></label>
                            </div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col"><p class="card-text " ><small class="text-muted">
                                Publicado por: <b>Jhon Mamani</b>
                            </small></p></div>
                            <div class="col"><p class="card-text " align="right"><small class="text-muted">
                                Hace 1 minuto
                        </small></p></div>
                        </div>
             
                        <button class="btn btn-secondary btn-block" name="update">
                        Editar
                    </button>
                    </div>

                </div>

            </div>


            <div class="col-6">


                <form action="index.php?id=<?php echo $id ?>" method="post">
                    <div class="card card-body">
                        <div class="mb-2">
                            <textarea class="offset-0 col-12 form-control" placeholder="Envia un comentario" name="comentario" required></textarea>
                        </div>
                        <div>
                            <button class="btn btn-secondary " name="update_comentar">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>


                <?php
                $querymensaje = "SELECT * FROM usuario_mensaje WHERE UsuMenUsuProID=$id ORDER by created_at DESC";
                $resultmensaje = mysqli_query($conn, $querymensaje);
                if (mysqli_num_rows($resultmensaje) >0) {
                ?>
                <div class="card card-body mt-3">
                    <?php
                    
                    while ($row = mysqli_fetch_array($resultmensaje)) {
                        ?>

                        <!-- Esto desde aqui se va repetir -->
                        <?php

                            $usu = $row['UsuMenUsuID'];
                            $queryusuario = mysqli_query($conn, "SELECT UsuID, UsuNom FROM usuario WHERE UsuID = $usu");
                            $datosb = mysqli_fetch_array($queryusuario);
                            ?>



                        <div class="card mb-3 card2" style="max-width: 540px;">
                            <div class="row no-gutters">
                                
                                <div class="col-md-4">

                                    <div class="imageny3" style="background-image:url('mostrar.php?id=<?php echo $datosb['UsuID']; ?>');">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                <?php if($idUser==$datosb['UsuID']){ ?>
                                    <div align="right">
                                        <a class="btn p-1" href="eliminar.php?idPag=<?php echo $id; ?>&idMen=<?php echo $row['UsuMenID']; ?>" style="background: white; color:#6D6D6D"><span class=" icon-cross"></span> </a>
                                    </div>
                    <?php }?>
                                    <div class="card-body PT-0">
                                        <h5 class="card-title"><?php

                                                                    $usu = $row['UsuMenUsuID'];
                                                                    $queryusuario = mysqli_query($conn, "SELECT UsuID, UsuNom FROM usuario WHERE UsuID = $usu");
                                                                    $datosb = mysqli_fetch_array($queryusuario);
                                                                    echo $datosb['UsuNom'] ?></h5>
                                        <p class="card-text">
                                            <?php
                                                echo $row['UsuMenDes'];
                                                ?></p>
                                        <p class="card-text"><small class="text-muted">
                                                <?php
                                                    $time = $row['created_at'];
                                                    imprimirTiempo($time);
                                                    ?>
                                            </small></p>
                                    </div>
                                </div>
                            </div>
                        </div>




                    <?php } ?>



                    <!--  hasta aqui para los comentarios-->
                </div>
                    <?php } ?>
            </div>


        </div>
    </div>
</div>

<?php
include("../../includes/footer.php")
?>