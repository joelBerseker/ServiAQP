<?php
    if(isset($_POST['idCat'])){
        $idC=$_POST['idCat'];
        if($idC!="-1"){
        include("../../includes/data_base.php");
        $query = "SELECT CatNom FROM categoria WHERE  CatId =".$idC;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row            = mysqli_fetch_array($result);
            $nomC = $row['CatNom'];
        }
        $querySC ="SELECT * FROM subcategoria WHERE SubCatEstReg =1 and  SubCatCatId =".$idC;
        $resultSC = mysqli_query($conn, $querySC);
?>
<div class="col-auto mt-2" style="max-width: 150px;">
    <button class="btn btn-sm mb-1 boton_menu bm_select btn-block" onclick="filtrarC(<?=$idC?>)"><?=$nomC?></button>
    <?php
        while ($row = mysqli_fetch_array($resultSC)) {
    ?>
    <button class="btn btn-sm mb-1 boton_menu  btn-block" onclick="filtrarSC(<?= $row['SubCatId'] ?>,<?=$idC?>)"><?=$row['SubCatNom']?></button>
    <?php
        }
    ?>
</div>
<?php
    }}else{
?>
<?php    
    }
?>