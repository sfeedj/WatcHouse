
//AFFICHER LES ELEMENTS EN DISLPAY : NONE
function affichageInvisible(classname){
  var x = document.getElementsByClassName(classname);
  if (x!=null){
    for(i=0;i<x.length;i++){
      if(x[i].style.display!="inline"){
        x[i].style.display="inline";
      }else{
        x[i].style.display="none";
      }
    }
  }
}


//DEVELOPPER LES DOMICILE D'UN CLIENT - LISTE CLIENT
function affichageDomiciles(id){
  var x = document.getElementsByClassName(id);
  if (x!=null){
    for(i=0;i<x.length;i++){
      if(x[i].style.display!="table-row"){
        x[i].style.display="table-row";
      }else{
        x[i].style.display="none";
      }
    }
  }
}

//ONGLETS - LISTE CLIENT
function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;
  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

//ATTRIBUER UNE COULEUR RANDOM
function changeBackground(){
  var i=1;
  boxes=document.getElementsByClassName('pieceWrapper');
  for(i=1;i<=boxes.length;i++){
    var random= Math.floor(Math.random() * 12 ) + 0;
    var clr = [
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
      '#A3CDF7',
    ];
    if(i<=12){
    document.getElementById("d"+i).style.background=clr[i].toString();
    }
    else{
      document.getElementById("d"+i).style.background=clr[random].toString();
    }
  }
}

// document.getElementById("d"+i).style.backgroundColor =
// '#'+Math.floor(Math.random()*16777215).toString(16);
function go(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    }
  };
  console.log(id);
  xhttp.open("GET", "ajax.php?id="+id, true);
  xhttp.send();

}

