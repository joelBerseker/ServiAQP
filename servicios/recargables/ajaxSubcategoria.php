<?php
    $db = new mysqli('localhost', 'root','','serviaqp');
    if(isset($_POST["categoria"]) && !empty($_POST["categoria"])){
        $query = $db->query("SELECT * FROM subcategoria WHERE SubCatCatId = ".$_POST['categoria']." ORDER BY SubCatNom ASC");
        $rowCount = $query->num_rows;
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['SubCatId'].'">'.$row['SubCatNom'].'</option>';
            }
        }else{
            echo '<option value="">Municipio no disponible</option>';
        }
    }
?>
