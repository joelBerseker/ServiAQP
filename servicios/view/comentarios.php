<?php
$database_red = "localhost";
$database_nombre = "root";
$database_contraseña = "";
$database_name = "serviaqp";
$conn2 = mysqli_connect(
    $database_red,
    $database_nombre,
    $database_contraseña,
    $database_name
);
$idPag;
if (isset($_GET['id'])) {
    $idPag = $_GET['id'];
} else {
    $idPag2 = $_POST['id'];
    $idPag = $idPag2;
    include("tiempo.php");
}
$query = "SELECT * FROM `Servicio_comentario` where SerComSerID = $idPag order by SerMenFecCre desc";
$resultProduct = mysqli_query($conn2, $query);
if (mysqli_num_rows($resultProduct) > 0) {
    while ($row = mysqli_fetch_array($resultProduct)) {
        $dirFin = '/ServiAQP/usuario/img/' . $row['UsuImgNom'];
?>
        <div class=" mb-3 ">
            <div class="row no-gutters">
                <div class="col-auto mr-4">
                    <div class="imageny3" style="background-image:url('<?= $dirFin ?>');"></div>
                </div>
                <div class="col card2 ml-2">
                   
                    <div class="card-body PT-0">
                        <div class="row no-gutters">
                            <div class="col">
                                <p class="card-text mb-0">
                                    <?= $row['SerMenMen']; ?>
                                </p>
                                <hr class="mb-1 mt-3">
                        <p class="card-text mb-0">
                            <small class="text-muted">
                                Publicado por: <?= $row['UsuNom']; ?>
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                <?= imprimirTiempo($row['SerMenFecCre']) ?>
                            </small>
                        </p>
                            </div>
                            <?php
                    if (isset($user)) {
                        if ($row['SerComUsuID'] == $user['UsuID']) {
                    ?>
                            <div class="float-right col-auto ml-2">
                                    <a class="btn  btn-sm btn-outline-secondary" href="#"> <em class="fas fa-times"></em> </a>
                                </div>
                    <?php
                        }
                    }
                    ?>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else { ?>
    <p>No hay comentarios</p>
<?php } ?>