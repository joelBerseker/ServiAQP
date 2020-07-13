$(document).ready(function(){
   
    $('#btnguardarServicio').click(function(){
        var datos= $('#formajax').serialize();
        $.ajax({
            type:"POST",
            url:"/BaseDatos/Zona/crud_product/save.php",
            data: datos,
            success:function(r){
                if(r==0){
                    alert("fallo al Ingresar");
                }else if(r==2){
                    alert("Ya existe");
                }
                else{
                    swal("Termine");
                }
                    
            }
        });
        $("#formajax")[0].reset();
        $('#recargar').load('tabla.php');
        return false;
    });
 
    $('#btnGuardarArchivos').click(function(){
        var formData= new FormData(document.getElementById('frmArchivos'));
        var fileSelect = document.getElementById('archivos');
        var files = fileSelect.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            formData.append('archivos[]', file, file.name);
        }
        $.ajax({
            url: "save.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                respuesta=respuesta.trim();
                if(respuesta==1){
                    $('#recargarArchivos').load("tabla.php");
                }else{
                    alert(respuesta);
                }
            }
        });
        return false;
    });
 });
 