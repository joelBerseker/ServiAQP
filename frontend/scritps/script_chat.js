function enviarMensaje(){
    var id =document.getElementById('creador');
    var formData= new FormData(document.getElementById('FormMensaje'));
    $.ajax({
        url: "/ServiAQP/chat/save.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success:function(respuesta){
            alert(respuesta);
            $('#Comentario').load('/ServiAQP/servicios/view/comentarios.php',{"creador":id.value});
        }
        
    });
    $("#FormMensaje")[0].reset();
    return false;
 }