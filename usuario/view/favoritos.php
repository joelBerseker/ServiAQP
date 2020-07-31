<?php
include("../../includes/data_base.php");
include('../../servicios/view/tiempo.php');
$id = $_REQUEST['id'];
?>
<div id="div_favo">
    <hr class="mt-3">
    <?php
    $sql = "SELECT * FROM favoritos_tabla WHERE FavUsuID=" . $id . " ORDER BY FacFecCre DESC";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $query2 = "SELECT  SerImgNom FROM servicio_img where SerImgSerId=" . $row['FavSerID'];
            $resultimg = mysqli_query($conn, $query2);
            if ($row2 = mysqli_fetch_array($resultimg)) {
                $dirImg = trim($row2[0]);
            }
            $dirFin = '/ServiAQP/servicios/img/' . $dirImg;
    ?>
            <div class="card3 mb-3">
                <div class="row no-gutters">
                    <div class="col-4">
                        <div class="imageny5 card-img" style="background-image:url('<?= $dirFin ?>');">
                        </div>
                    </div>
                    
                    <div class="col-8">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title"><?= $row["SerNom"] ?></h5>

                                    <hr class=" mb-2">
                                    <textarea disabled class="descrip text-left descrip2"><?= $row["SerDes"] ?></textarea>
                                    <hr class="mb-2">
                                    <p class="card-text"><small class="text-muted"><?=imprimirTiempo( $row["FacFecCre"]) ?></small></p>
                                </div>
                                <div class="col-auto">
                                    <a href="../../servicios/view/?id=<?= $row['SerID'] ?>" class="btn btn-outline-secondary btn-sm btn-block"><em class="fas fa-chevron-right"></em></a>
                                    <button class="btn  btn-sm btn-outline-secondary btn-block" onclick="EliminarF(<?= $row['FavID'] ?>,<?= $user["UsuID"] ?>)"> <em class="fas fa-times"></em> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else { ?>
        <p>No hay elementos</p>
    <?php } ?>
</div>