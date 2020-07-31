<?php

$titulo_html = "Error";
include("../includes/sesion.php");
include("../includes/global_variable.php");
include('../includes/navbar.php');
include('../includes/header.php');

$a = "Error 404<br/>ocurrido";
if(isset($_GET['mensaje'])){
    $a =$_GET['mensaje'];
}

?>
<div class="section">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 mt-5">
                <div class="card mb-4 border-0">
                    <div class="card-body text-center pad_body_ser">
                        <h3 class="card-title">Sucedio un error <i class="far fa-sad-tear"></i></h3>
                        <hr>
                        <p><?=$a?></p>
                        <hr class="mb-2">
                        <a onclick="history.go(-1)" class="float-left btn btn-primary btn-sm" style="color: white;"><em class="fas fa-chevron-left"></em></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../includes/footer.php");
?>