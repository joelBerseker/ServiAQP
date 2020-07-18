$(document).ready(function(){
    $('#btnGuardarServicio').click(function(){
        var formData= new FormData(document.getElementById('formServicio'));
        var fileSelect = document.getElementById('ServicioImagenes');
        var files = fileSelect.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            formData.append('imagenes[]', file, file.name);
        }
        $.ajax({
            url: "/ServiAQP/servicios/crud_servicio/save.php",
            type: "POST",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                alert(respuesta);
            }
        });
        alert("Espera");
        $("#formServicio")[0].reset();
        $('#recargaTablaServicio').load('/ServiAQP/servicios/recargables/TablaServicios.php');
        return false;
    });
    $('#btnCalificarServicio').click(function(){
        var formData= new FormData(document.getElementById('formCalificacion'));
        $.ajax({
            url: "/ServiAQP/servicios/crud_servicio/save.php",
            type: "POST",
            data: formData,
            success:function(respuesta){
                alert(respuesta);
            }
        });
        return false;
    });
    $('#categoria').on('change',function(){
        var categoriaID= $(this).val();
        if(categoria){
            $.ajax({
                url: "/ServiAQP/servicios/recargables/ajaxSubcategoria.php",
                type: "POST",
                data:'categoria='+categoriaID,
                success:function(html){

                    $('#subcategoria').html(html);
                    
                }
            });
        }else{
            $('#subcategoria').html('<option value="">Selecciona una categoria primero</option>');
        }   
    });
    
 });
 function eliminarServicio(idRecibido){
    if(confirm("Seguro que desea eliminar? id= ".idRecibido)){
        $.ajax({
            url: "/ServiAQP/servicios/crud_servicio/delete.php",
            type: "POST",
            data:'id='+idRecibido,
            success:function(enviado)
            {   
                if(enviado)
                    $('#recargaTablaServicio').load('/ServiAQP/servicios/recargables/TablaServicios.php');
                else
                    alert("No se Elimino")
            }
        });
    }else{

    }
    return false;
 }