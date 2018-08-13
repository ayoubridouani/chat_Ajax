var username = document.getElementsByTagName("input")[0];
var message = document.getElementsByTagName("input")[1];
var submit = document.getElementsByTagName("input")[2];

username.onfocus = removePlaceholder;
message.onfocus = removePlaceholder;
username.onblur = addPlaceholder;
message.onblur = addPlaceholder;

function removePlaceholder(){
  this.removeAttribute("placeholder");  
}
function addPlaceholder(){
  if(!this.hasAttribute("placeholder")){
    this.setAttribute("placeholder",this.getAttribute("name"));
  }
}
submit.onclick = function(){    
    var request = new XMLHttpRequest();
    request.open("GET","sendData.php?username="+username.value+"&"+"message="+message.value,true);
    request.send(null);
    username.setAttribute("disabled","on");
    message.value="";
    return false;
};
function chat_ajax(){
  var req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200){
      document.getElementsByClassName('containner1')[0].innerHTML = req.responseText;
    }
  };
  req.open('GET', 'getData.php', true);
  req.send();
}
//chat_ajax();
setInterval(function(){chat_ajax();}, 1000);
