var usuario;
var from;
function select(usuario, from) {
    var xhr = new XMLHttpRequest();
    var url = "../../config/showmessages.php?user=" + encodeURIComponent(usuario) + "&from=" + encodeURIComponent(from);
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          console.log(usuario);
          document.getElementById("respuesta").innerHTML = response;
        } else {
          console.error("Error:", xhr.status);
        }
      }
    };
    xhr.send();
}

var group;
var userg;
function getgroup(group, userg) {
    var xhr = new XMLHttpRequest();
    var url2 = "../../config/showmessages.php?group=" + encodeURIComponent(group) + "&userg=" + encodeURIComponent(userg);
    xhr.open("GET", url2, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          console.log(group);
          console.log(userg);
          document.getElementById("respuesta").innerHTML = response;
        } else {
          console.error("Error:", xhr.status);
        }
      }
    };
    xhr.send();
}