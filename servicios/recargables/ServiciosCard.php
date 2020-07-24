<div class="row justify-content-right">
    <?php
    $query = "SELECT * FROM `servicio` WHERE `SerEstReg` = 1";
    if (isset($_POST['idCat'])) {
        include("../../includes/data_base.php");
        include("../../includes/sesion.php");
        $idCat = $_POST['idCat'];
        if ($idCat == "-1") {
            $query = "SELECT * FROM `servicio` WHERE `SerEstReg` = 1";
        } else {
            if (isset($_POST['idCatSub'])) {
                $sc = $_POST['idCatSub'];
                $query = "SELECT * FROM `servicio` WHERE `SerEstReg` = 1 and `SerCatID` =" . $idCat . " and SerSubCatID=" . $sc;
            } else {
                $query = "SELECT * FROM `servicio` WHERE `SerEstReg` = 1 and `SerCatID` =" . $idCat;
            }
        }
    }
    $resultProduct = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($resultProduct)) {
        $query2 = "SELECT  SerImgNom FROM servicio_img where SerImgSerId=" . $row['SerID'];
        $result = mysqli_query($conn, $query2);
        if ($row2 = mysqli_fetch_array($result)) {
            $dirImg = trim($row2[0]);
        }
        $dirFin = '/ServiAQP/servicios/img/' . $dirImg;
    ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <div class="card mb-4 border-0 card-ani">
                <div class="imageny card-img" style="background-image:url('<?= $dirFin ?>');">
                </div>
                <div class="card-img-overlay pad_serv">
                    <a class="btn  btn-sm informacion-btn">S/. <?= $row['SerPre'] ?></a>
                    <a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> <?= $row['SerVal'] ?></a>
                </div>
                <div class="card-body text-center pad_body_ser">
                    <h3 class="card-title pad_title_serv"><?= $row['SerNom'] ?></h3>
                    <hr class="pt-0 mt-0 mb-1">
                    <textarea disabled class="descrip text-center"><?= $row['SerDes'] ?></textarea>
                    <hr class="pt-0 mt-0 mb-2">
                    <?php
                    if (isset($user)) {
                        $user1       = $user['UsuID'];
                        $id = $row['SerID'];
                        $queryF = "SELECT * FROM favoritos WHERE FavUsuID = $user1 and FavSerID=$id";
                        $resultProductF = mysqli_query($conn, $queryF);
                        $totalF = mysqli_num_rows($resultProductF);
                    } else {
                        $totalF = 0;
                    }

                    ?>
                    <a href="view/?id=<?= $row['SerID'] ?>" class="float-right btn btn-primary btn-sm ml-1"><em class="fas fa-chevron-right"></em></a>
                    <?php if (!empty($user)) : ?>
                        <a href="" class="float-right btn btn-primary btn-sm card-link ani_heart <?php if ($totalF > 0) echo "btn-disabled" ?>" <?php if ($totalF > 0) echo "disabled" ?> onclick="favoritos(<?= $row['SerID'] ?>)"><em class="fas fa-heart"></em></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>