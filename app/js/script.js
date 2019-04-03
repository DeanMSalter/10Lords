function openNav() {
  document.getElementById("navigationBar").style.width = "15%";
  document.getElementById("main").style.width = "85%";
}

function closeNav() {
  document.getElementById("navigationBar").style.width = "0px";
  document.getElementById("main").style.width = "100%";
}
function toggleNav(){
  if(document.getElementById("navigationBar").style.width == "0px"){
    document.getElementById("navigationBar").style.width = "15%";
    document.getElementById("main").style.width = "85%";
  }else{
    document.getElementById("navigationBar").style.width = "0px";
    document.getElementById("main").style.width = "100%";
  }
}
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}


var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function load_chat() {
     document.getElementById("chat").innerHTML='<object type="text/php" data="chat-data.php" ></object>';
}
