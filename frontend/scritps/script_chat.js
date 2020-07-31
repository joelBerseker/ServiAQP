$(document).keypress(function (event) {
  if (event.which == "13") {
    event.preventDefault();
    enviarMensaje();
  }
});
function myFunction() {
  location.replace("https://www.w3schools.com");
}
function validarMensaje() {
  var name = document.forms["FormMensaje"]["mensaje"];
  if (name.value == "") {
    name.setCustomValidity("This field cannot be left blank");
    return false;
  } else {
    name.setCustomValidity("");
    return true;
  }
  return true;
}
function enviarMensaje() {
  if (validarMensaje()) {
    var id = document.getElementById("creador");
    var formData = new FormData(document.getElementById("FormMensaje"));
    $.ajax({
      url: "/ServiAQP/chat/save.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (respuesta) {
        $("#chatsergio").load("/ServiAQP/chat/aja.php", { creador: id.value });
      },
    });
    $("#FormMensaje")[0].reset();
  }
  return false;
}

var timestamp2 = 0;
function chat_push(creador) {
  
  $.ajax({
    url: "/ServiAQP/includes/chat_push.php",
    type: "POST",
    data: "&timestamp2=" + timestamp2 +"&creador="+creador,
    dataType: "html",
    success: function (data) {
      var json = eval("(" + data + ")");
      timestamp2 = json.NotFecCre;
      actualizar = json.actualizar;
      if (actualizar == 1) {
        
        var id = document.getElementById("creador");
        $("#chatsergio").load("/ServiAQP/chat/aja.php", { creador: id.value });
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
