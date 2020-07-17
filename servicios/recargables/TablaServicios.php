<table class='table table-bordered'>
	<thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Subcategoria</th>
        <th>Creador por</th>
        <th>Estado</th>
        <th>Fecha de creacion</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    <?php
        $database_red ="localhost";
        $database_nombre="root";
        $database_contraseña="";
        $database_name="serviaqp";
        $conn2 = mysqli_connect(
            $database_red,
            $database_nombre,
            $database_contraseña,
            $database_name
        )
    ?>
    <?php
        $query = "SELECT * FROM `servicio_tabla`";
        $resultProduct= mysqli_query($conn2, $query);
        while($row= mysqli_fetch_array($resultProduct)){
    ?>
        <tr>
            <td><?php echo $row['SerID']?></td>
            <td><?php echo $row['SerNom']?></td>
            <td><?php echo $row['CatNom']?></td>
            <td><?php echo $row['SubCatNom']?></td>
            <td><?php echo $row['UsuNom']?></td>
            <td><?php echo $row['SerEstReg']?></td>
            <td><?php echo $row['SerFecCre']?></td>
            <td>
                <a href="crud_subcategoria/edit.php?id=<?php echo $row['SerID']?>" class="btn btn-warning">
                    Edit
                </a>
                <button class="btn btn-danger" onclick="eliminarServicio(<?php echo $row['SerID']?>)">Delete</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>