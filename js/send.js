var group;
function getgroup(group) {
    var xhr = new XMLHttpRequest();
    var url = "../../config/showmessages.php?group=" + encodeURIComponent(group);
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = xhr.responseText;
          console.log(group);
          document.getElementById("respuesta").innerHTML = response;
        } else {
          console.error("Error:", xhr.status);
        }
      }
    };
    xhr.send();
}