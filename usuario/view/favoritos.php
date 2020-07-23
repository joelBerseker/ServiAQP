<?php
include("../../includes/data_base.php");
$id = $_GET['id'];
?>
<div id="div_favo">
    <h5>Favoritos</h5>
    <hr class="mt-1">
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
                    <div class="col-md-4">
                        <img src="<?=$dirFin?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <h5 class="card-title"><?= $row["SerNom"] ?></h5>
                            <hr>
                            <p class="card-text"><?= $row["SerDes"] ?></p>
                            <hr class="mb-2">
                            <p class="card-text"><small class="text-muted"><?= $row["FacFecCre"] ?></small></p>
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