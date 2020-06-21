<?php
include('includes/global_variable.php');
include('includes/navbar.php');
$inicio = true;
$titulo_html = "Inicio";


include("includes/header.php");
?>

<form action="phpcheckstyle-master/runfromWeb.php" method="post">
<div class="form-group form-row">
	<div class="col-4"><label>sourceDir:</label></div>
    <div class="col"><input type="text" name="sourceDir" class="form-control form-control-sm" autofocus></div>
</div>
<div class="form-group form-row">
	<div class="col-4"><label>resultDir:</label></div>
    <div class="col"><input type="text" name="resultDir" class="form-control form-control-sm" autofocus></div>
</div>
<div class="form-group form-row">
	<div class="col-4"><label>configFile:</label></div>
    <div class="col"><input type="text" name="configFile" class="form-control form-control-sm" autofocus></div>
</div>
<div class="form-group form-row">
	<div class="col-4"><label>lang:</label></div>
    <div class="col"><input type="text" name="lang" class="form-control form-control-sm" autofocus></div>
</div>
<input type="submit" class="btn btn-success btn-block" name="save_subcategoria" value="Enviar">
</form>
<?php
	include("includes/footer.php");
?>
