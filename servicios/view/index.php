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

    $query = "SELECT * FROM servicio_tabla WHERE  SerID = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row            = mysqli_fetch_array($result);
        $creador        = $row['SerUsuID'];
        $creadorN        = $row['UsuNom'];
        $nombre         = $row['SerNom'];
        $categoria       = $row['SerCatID'];
        $categoriaN     = $row['CatNom'];
        $subcategoria   = $row['SerSubCatID'];
        $subcategoriaN   = $row['SubCatNom'];
        $preguntas      = $row['SerPreFre'];
        $descripcion    = $row['SerDes'];
        $valoracion     = $row['SerVal'];
        $precio         = $row['SerPre'];
        $fechaC         = $row['SerFecCre'];
        $query2 = "SELECT * FROM servicio_img WHERE SerImgSerId = $id";
        $result2 = mysqli_query($conn, $query2);
        $arrayImg= array();
        $i=0;
        while($row2= mysqli_fetch_array($result2)){
            $arrayImg[$i]=array(
                "nombre"=>$row2['SerImgNom'],
                "tipo"=>$row2['SerImgTip']
            );
            $i=$i+1;
        }
        
    }
}
?>
<?php
include('../../includes/navbar.php');
$titulo_html = "Servicios";
include('../../includes/header.php');
include("../../includes/data_base.php");
?>

<div class="section">
    <div class="container ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $dirEjec ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vista de Servicio</li>
            </ol>
        </nav>
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="col-6">

                <div class="card">
                    <div class="img-animtion">
                        <img class="card-img-top" src="https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png" alt="Imagen del autor del comentario" style="width: 100%;" />
                        <!--<img class="card-img-top" src="../mostrar.php?id=<?php //echo $product; ?>" alt="Imagen del autor del comentario" style="width: 100%;" />--->

                    </div>
                    <div class="card-img-overlay">
                        <a class="btn  btn-sm informacion-btn"><?=$precio?></a>
                        <a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i><?=$valoracion?></a>
                    </div>
                    <div class="card-body text-left">
                        <h4 class="card-title text-center "><?=$nombre?></h4>
                        <hr>
                        <div class="form-row form-group ">
                            <div class="col-4"> <label>Descripcion del producto:</label></div>
                            <div class="col"><label><?=$descripcion?></label></div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col-4"> <label>Calificacion:</label></div>
                            <div class="col">
                                <button class="btn btn-primary btn-sm av ml-3" id="btnCalificarServicio" onclick="calificar()">Calificar</button>        
                                <form id="formCalificacion" method="POST">
                                    <div class="clasificacion  clasi">
                                        <input type="hidden" name="id" value="<?=$id?>" />
                                        <input id="radio1" type="radio" name="estrellas" value="5" class="disradio">
                                        <label for="radio1" class="labe"><i class="fas fa-star"></i></label>
                                        <input id="radio2" type="radio" name="estrellas" value="4" class="disradio">
                                        <label for="radio2" class="labe"><i class="fas fa-star"></i></label>
                                        <input id="radio3" type="radio" name="estrellas" value="3" class="disradio">
                                        <label for="radio3" class="labe"><i class="fas fa-star"></i></label>
                                        <input id="radio4" type="radio" name="estrellas" value="2" class="disradio">
                                        <label for="radio4" class="labe"><i class="fas fa-star"></i></label>
                                        <input id="radio5" type="radio" name="estrellas" value="1" class="disradio">
                                        <label for="radio5" class="labe"><i class="fas fa-star"></i></label>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-row form-group ">
                            <div class="col">
                                <p class="card-text ">
                                    <small class="text-muted">
                                        <?=$creadorN?>
                                    </small>
                                </p>
                            </div>
                            <div class="col">
                                <p class="card-text float-right">
                                    <small class="text-muted">
                                        <?=imprimirTiempo($fechaC)?>
                                    </small>
                                </p>
                            </div>
                        </div>
                        <hr class="mt-1">

                        <a href="#" class="btn btn-primary btn-sm ani_heart"><em class="fas fa-heart"></em></a>

                        <a href="#" class="btn btn-primary btn-sm" >Contactar</a>
                        <a href="#" class="btn btn-primary btn-sm">Contratar <?=$precio?></a>
                        <a href="#" class="btn btn-primary btn-sm float-right">Editar</a>
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
                            <button class="btn btn-primary btn-sm " name="update_comentar">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>


                <div class="card card-body mt-3">
                    <div>
                        <h5>Comentarios</h5>

                    </div>
                    <hr class="mt-1">
                    <!-- Esto desde aqui se va repetir -->
                    <div class=" mb-3 " style="max-width: 540px;">
                        <div class="row no-gutters">

                            <div class="col-md-3">
                                <div class="imageny3" style="background-image:url('../../frontend/images/usuario-sin-imagen.jpg');"></div>
                            </div>
                            <div class="col-md-9 card2">

                                <div class="float-right ">
                                    <a class="btn equis btn-sm" href="#"><em class="fas fa-times"></em> </a>
                                </div>

                                <div class="card-body PT-0">


                                    <p class="card-text mb-0">
                                        Este es la descripcion del mensajenvamos a ver hasta donde se pone y como fucnniona estpo xddxd
                                    </p>
                                    <hr class="mb-1 mt-3">
                                    <p class="card-text mb-0">
                                        <small class="text-muted">
                                            Publicado por: Jhon Mamani
                                        </small>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Hace 10 minutos
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../../includes/footer.php")
?>