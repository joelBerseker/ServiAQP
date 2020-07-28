function ajax(){
    var req = new XMLHttpRequest();

    req.onreadystatechange = function(){
      if (req.readyState == 4 && req.status == 200) {
        document.getElementById('chatsergio').innerHTML = req.responseText;
      }
    }
    
    req.open('GET', 'aja.php', true);
    req.send();
  }
  function actualizar(creador){
    $('#chatsergio').load('/ServiAQP/chat/aja.php',{"creador":creador});
  }
  

  //linea que hace que se refresque la pagina cada segundo
  setInterval(function(){ajax()});