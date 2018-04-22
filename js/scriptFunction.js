function affichageInvisible(){
  var x = document.getElementsByClassName('invisible');
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

function afficherInvisibleSuppr(){
  var x = document.getElementsByClassName("invisibleSuppr");
  var i;
  for(i=0;i<x.length;i++){
    x[i].style.display = "inline";
  }
}
function cacherInvisibleSuppr(){
  var x = document.getElementsByClassName("invisibleSuppr");
  var i;
  for(i=0;i<x.length;i++){
    x[i].style.display = "none";
  }
}

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
