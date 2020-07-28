$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
      enviarMensaje();
    }
});
function myFunction() {
  location.replace("https://www.w3schools.com")
}
function validarMensaje(){
  var name = document.forms["FormMensaje"]["mensaje"];
    if (name.value == "") {
      name.setCustomValidity("This field cannot be left blank");
      return false;
    }else{
        name.setCustomValidity("");
        return true;
    }
    return true;
}
function enviarMensaje(){
    if(validarMensaje()){
      var id =document.getElementById('creador');   
      var formData= new FormData(document.getElementById('FormMensaje'));
      $.ajax({
          url: "/ServiAQP/chat/save.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success:function(respuesta){
              $('#chatsergio').load('/ServiAQP/chat/aja.php',{"creador":id.value});
          }        
      });
      $("#FormMensaje")[0].reset();
    }
    return false;
 }