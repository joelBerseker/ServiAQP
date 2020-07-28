/*function ajax(){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
      if (req.readyState == 4 && req.status == 200) {
        document.getElementById('chatsergio').innerHTML = req.responseText;
      }
    }
    
    req.open('GET', 'aja.php', true);
    req.send();
  }*/
  
function actualizar(){
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
            //$('#Comentario').load('/ServiAQP/servicios/view/comentarios.php',{"creador":id.value});
        }
        
    });
    $("#FormMensaje")[0].reset();
    return false;
 }

  //linea que hace que se refresque la pagina cada segundo
  setInterval(function(){ajax()});