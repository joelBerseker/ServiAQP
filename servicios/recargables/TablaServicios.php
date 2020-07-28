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
$query = "SELECT * FROM `servicio_tabla`";
$resultProduct = mysqli_query($conn2, $query);
if (mysqli_num_rows($resultProduct) > 0) {
?>
    <div class="table-responsive table-bordered tb">
        <table class='table'>
            <thead class="thead-light">
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
                while ($row = mysqli_fetch_array($resultProduct)) {
                ?>
                    <tr>
                        <td><?php echo $row['SerID'] ?></td>
                        <td><?php echo $row['SerNom'] ?></td>
                        <td><?php echo $row['CatNom'] ?></td>
                        <td><?php echo $row['SubCatNom'] ?></td>
                        <td><?php echo $row['UsuNom'] ?></td>
                        <td><?php echo $row['SerEstReg'] ?></td>
                        <td><?php echo $row['SerFecCre'] ?></td>
                        <td>
                            <button type="button" onclick="edit_rol(<?php echo $row['SerID'] ?>)" class="btn btn-outline-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button>
                            <button  onclick="eliminarServicio(<?=$row['SerID']?>)" class="btn btn-outline-danger btn-sm mb-1">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <p>No hay elementos</p>
<?php } ?>