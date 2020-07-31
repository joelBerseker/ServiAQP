function notification_display() {
  $.ajax({
    url: "/ServiAQP/includes/notification.php",
    type: "POST",
    processData: false,
    success: function (data) {
      $(".noti_contenido").html(data);
      $(".num_noti").text(0);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}
var timestamp = 0;

function notification_push() {
  $.ajax({
    url: "/ServiAQP/includes/notification_push.php",
    type: "POST",
    data: "&timestamp=" + timestamp,
    dataType: "html",
    success: function (data) {
      var json = eval("(" + data + ")");
      timestamp = json.NotFecCre;
      NotDes = json.NotDes;
      actualizar = json.actualizar;
      NotID = json.NotID;
      if (actualizar == 1) {
        var lista = document.getElementsByClassName("noti_push");
        lista[0].insertAdjacentHTML(
          "afterbegin",
          "<div id='" +
            NotID +
            "'class='toast mb-0 mt-1 ' data-delay='5000'>" +
            "<div class='toast-header'  role='alert' aria-live='assertive' aria-atomic='true'>" +
            "<small>" +
            timestamp +
            "</small>" +
            "<button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>" +
            "<span aria-hidden='true'>&times;</span>" +
            "</button>" +
            "</div>" +
            "<div class='toast-body pt-2'>" +
            NotDes +
            "</div>" +
            "</div>"
        );
        var tx = $(".num_noti").text();
        var sum = parseInt(tx) + 1;
        $(".num_noti").text(sum);
        $("#" + NotID).toast("show");
        /*eliminarElemento(NotID);*/
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function eliminarElemento(id) {
  setTimeout(function () {
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
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_acceso(id) {
  $.ajax({
    url: "/ServiAQP/acceso/crud_acceso/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_recurso(id) {
  $.ajax({
    url: "/ServiAQP/recurso/crud_recurso/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_usuario(id) {
  $.ajax({
    url: "/ServiAQP/usuario/crud_usuario/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_usuario2(id) {
  $.ajax({
    url: "/ServiAQP/usuario/view/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_categoria(id) {
  $.ajax({
    url: "/ServiAQP/categorias/crud_categoria/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function edit_servicio(id) {
  $.ajax({
    url: "/ServiAQP/servicios/crud_servicio/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}
function edit_subcategoria(id) {
  $.ajax({
    url: "/ServiAQP/subcategorias/crud_subcategoria/edit.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $(".modal_body_edit").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}
function noti(id) {
  $.ajax({
    url: "/ServiAQP/usuario/view/notificaciones.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $('#recargarusuario').html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#bnoti').addClass("bm_select");
     
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function favo(id) {
  $.ajax({
    url: "/ServiAQP/usuario/view/favoritos.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $("#recargarusuario").html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#bfavo').addClass("bm_select");
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}
function adqu(id) {
  $.ajax({
    url: "/ServiAQP/usuario/view/adquiridos.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $('#recargarusuario').html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#badqu').addClass("bm_select");
     
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}
function publ(id) {
  $.ajax({
    url: "/ServiAQP/usuario/view/publicados.php",
    type: "GET",
    data: "&id=" + id,
    dataType: "html",
    success: function (data) {
      $('#recargarusuario').html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#bpubl').addClass("bm_select");
     
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function chat() {
  $.ajax({
    url: "/ServiAQP/chat/chats.php",
    type: "GET",
    dataType: "html",
    success: function (data) {
      $('#recargarusuario').html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#bchat').addClass("bm_select");
     
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

function conver(creador) {
  $.ajax({
    url: "/ServiAQP/chat/index.php",
    type: "GET",
    data: "&creador=" + creador +"&leido=1",
    dataType: "html",
    success: function (data) {
      $('#recargarusuario').html(data);
      $('.boton_menu').removeClass("bm_select");
      $('#bchat').addClass("bm_select");
     
    },
    error: function (jqXHR, textStatus, errorThrown) {
      if (jqXHR.status === 0) {
        alert("Not connect: Verify Network.");
      } else if (jqXHR.status == 404) {
        alert("Requested page not found [404]");
      } else if (jqXHR.status == 500) {
        alert("Internal Server Error [500].");
      } else if (textStatus === "parsererror") {
        alert("Requested JSON parse failed.");
      } else if (textStatus === "timeout") {
        alert("Time out error.");
      } else if (textStatus === "abort") {
        alert("Ajax request aborted.");
      } else {
        alert("Uncaught Error: " + jqXHR.responseText);
      }
    },
  });
}

$("#formRegistrar").validate({
  rules: {
      confirm_password: {
          equalTo: "#password",      
      }
  },
  messages: {
      nombre: {
          required: "Rellene este campo",
      },
      email: {
          required: "Rellene este campo",
          email: "Introduzca una direccion de correo",
      },
      password: {
          required: "Rellene este campo",
          minlength: "Use al menos 8 caracteres",
          
      },
      confirm_password: {
          required: "Rellene este campo",
          equalTo: "Las contraseñas debe ser iguales",
          minlength: "Use al menos 8 caracteres",
      }
  }
});