function notification_display() {
    $.ajax({
        url: "/ServiAQP/includes/notification.php",
        type: "POST",
        processData: false,
        success: function(data) {
            $(".noti_contenido").html(data);
            $(".num_noti").text(0);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        }
    });
}
var timestamp = 0;

function notification_push() {
    $.ajax({
        url: "/ServiAQP/includes/notification_push.php",
        type: "POST",
        data: "&timestamp=" + timestamp,
        dataType: "html",
        success: function(data) {
            var json = eval("(" + data + ")");
            timestamp = json.NotFecCre;
            NotDes = json.NotDes;
            actualizar = json.actualizar;
            NotID = json.NotID;
            if (actualizar == 1) {
                var lista = document.getElementsByClassName("noti_push");
                lista[0].insertAdjacentHTML("afterbegin", 
                "<div id='"+NotID+"'class='toast mb-0 mt-1 ' data-delay='3000'>" +
                    "<div class='toast-header'  role='alert' aria-live='assertive' aria-atomic='true'>" +
                    "<strong class='mr-auto'>Notificacion</strong>" +
                    "<small>" + timestamp + "</small>" +
                    "<button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>" +
                    "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "</div>" +
                    "<div class='toast-body pt-2'>" +
                    NotDes +
                    "</div>" +
                    "</div>"
                );
                var tx=$(".num_noti").text();
                var sum=parseInt(tx)+1;
                $(".num_noti").text(sum);
                $('#'+NotID).toast('show');
                /*eliminarElemento(NotID);*/

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        }
    });
    
}

function eliminarElemento(id) {	
    setTimeout(function() {
        imagen = document.getElementById(id);
        if (!imagen) {
            alert("El elemento selecionado no existe");
        } else {
            padre = imagen.parentNode;
            padre.removeChild(imagen);
        }
        
    }, 2000);

}





function edit_rol(id) {
    $.ajax({
        url: "/ServiAQP/rol/crud_rol/edit.php",
        type: "GET",
        data: "&id=" + id,
        dataType: "html",
        success: function(data) {
            
            $(".modal_body_edit").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        }
    });
}

function edit_acceso(id) {
    $.ajax({
        url: "/ServiAQP/acceso/crud_acceso/edit.php",
        type: "GET",
        data: "&id=" + id,
        dataType: "html",
        success: function(data) {
            
            $(".modal_body_edit").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        }
    });
}

function edit_recurso(id) {
    $.ajax({
        url: "/ServiAQP/recurso/crud_recurso/edit.php",
        type: "GET",
        data: "&id=" + id,
        dataType: "html",
        success: function(data) {
            
            $(".modal_body_edit").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 0) {
                alert('Not connect: Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (textStatus === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (textStatus === 'timeout') {
                alert('Time out error.');
            } else if (textStatus === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error: ' + jqXHR.responseText);
            }
        }
    });
}