<?php
include("../../includes/sesion.php");
include("../../includes/data_base.php");
include("../../includes/global_variable.php");
include("tiempo.php");
?>
<?php

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
        $arrayImg = array();
        $i = 0;
        while ($row2 = mysqli_fetch_array($result2)) {
            $arrayImg[$i] = array(
                "nombre" => $row2['SerImgNom'],
                "tipo" => $row2['SerImgTip']
            );
            $i = $i + 1;
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
            <div class="col-12 col-lg-6">

                <div class="card card_ove">
                    <div class="img-animtion">
                        <?php
                        $size = count($arrayImg);
                        ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <?php
                                for ($i = 1; $i < $size; $i++) {
                                ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                                <?php
                                }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                foreach ($arrayImg as $clave => $valor) {
                                    $dirFin = '/ServiAQP/servicios/img/' . $valor['nombre'];
                                ?>
                                    <div class="carousel-item <?php if ($clave == 0) echo "active" ?>">
                                        <img class="d-block w-100" src="<?= $dirFin ?>" alt="slide <?= $clave ?>">
                                    </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-img-overlay">
                        <a class="btn  btn-sm informacion-btn">S/. <?= $precio ?></a>
                        <a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> <?= $valoracion ?></a>
                    </div>
                    <div class="card-body text-left">
                        <h4 class="card-title text-center "><?= $nombre ?></h4>
                        <hr>
                        <div class="form-row form-group ">
                            <div class="col-4"> <label>Descripcion del producto:</label></div>
                            <div class="col"><label><?= $descripcion ?></label></div>
                        </div>
                        <?php if (!empty($user)) : ?>
                        <div class="form-row form-group ">
                            <div class="col-4"> <label>Calificacion:</label></div>
                            <div class="col">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <form id="formCalificacion" method="POST">
                                            <div class="clasificacion  clasi">
                                                <!--Aca-->
                                                 <input type="hidden" name="id" value="<?= $id ?>" />
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
                                    <div class="col-auto">
                                        <button class="btn btn-primary btn-sm av ml-3" id="btnCalificarServicio" onclick="calificar()">Calificar</button>
                                        
                                    </div>  
                                </div>     

                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row ">
                            <div class="col">
                                <p class="card-text ">
                                    <small class="text-muted">
                                        Creado por <?= $creadorN ?>
                                    </small>
                                </p>
                            </div>
                            <div class="col">
                                <p class="card-text float-right">
                                    <small class="text-muted">
                                        <?= imprimirTiempo($fechaC) ?>
                                    </small>
                                </p>
                            </div>
                        </div>
                        <?php if (!empty($user)) : ?>
                        <hr class="mt-3">
                        <?php 
                            if(isset($user)){
                                $user1       = $user['UsuID'];
                                $queryA ="SELECT * FROM adquiridos WHERE AdqUsuID = $user1 and AdqSerID=$id";
                                $resultProduct = mysqli_query($conn, $queryA);
                                $totalA = mysqli_num_rows($resultProduct);
                                $queryF ="SELECT * FROM favoritos WHERE FavUsuID = $user1 and FavSerID=$id";
                                $resultProductF = mysqli_query($conn, $queryF);
                                $totalF = mysqli_num_rows($resultProductF);
                            }
                            else{
                                $totalA = 0;
                                $totalF = 0;
                            }
                        ?>
                        <button class="btn btn-primary btn-sm ani_heart <?php if ($totalF > 0) echo "btn-disabled" ?>" <?php if ($totalF > 0) echo "disabled" ?> onclick="favoritos(<?= $id ?>)">
                            <em class="fas fa-heart"></em>
                        </button>
                    
                        <a href="../../chat/?creador=<?= $creador ?>" class="btn btn-primary btn-sm">Contactar</a>
                        <button href="#" class="btn btn-primary btn-sm <?php if ($totalA > 0) echo "btn-disabled" ?>" <?php if ($totalA > 0) echo "disabled" ?> onclick="adquirir(<?= $id ?>)">Contratar <?= $precio ?></button>
                        <?php
                        if (isset($user)) {
                            if ($creador == $user['UsuID']) {
                        ?>
                                <a href="#" class="btn btn-primary btn-sm float-right">Editar</a>
                        <?php
                            }
                        }
                        ?>
                        <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal" data-target="#reportModal" data-whatever="@mdo">Reportar</button>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#notificarModal" data-whatever="@mdo">Notificar</button>
                        <?php endif; ?>
                    </div>

                </div>

            </div>


            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <div class="card card-body">
                    <div>
                        <h5>Preguntas frecuentes</h5>

                    </div>
                    <hr class="mt-1">
                    <p><?= $preguntas ?>
                    </p>
                </div>
                <div class="card card-body mt-3">
                    <div>
                        <h5>Comentarios</h5>
                    </div>
                    <hr class="mt-1">
                    <?php if (!empty($user)) : ?>
                    <div class="row no-gutters">
                        <div class="col">
                            <form method="post" id="FormComentario">
                                <input type="hidden" id="idServicio" name="id" value="<?= $id ?>" />
                                <div class="mb-2">
                                    <textarea class="offset-0 col-12 form-control" placeholder="Envia un comentario" name="comentario" required></textarea>
                                </div>
                            
                            </form>
                        </div>
                        <div class="col-auto ml-2">
                            <button class="btn btn-primary btn-sm float-right" name="update_comentar" onclick="comentar()">
                                Enviar
                            </button>
                        </div>
                    </div>
                    <hr>
                    <?php endif; ?>
                    <!-- Esto desde aqui se va repetir -->
                    <div id="Comentario">
                        <?php
                        include("comentarios.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("reportar.php");
include("notificar.php");
include("../../includes/footer.php");
?>