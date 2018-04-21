function afficherInvisible(){
  var x = document.getElementsByClassName("invisible");
  var i;
  for(i=0;i<x.length;i++){
    x[i].style.display = "inline";
  }
}

function cacherInvisible(){
  var x = document.getElementsByClassName("invisible");
  x[0].style.display = "none";
  x[1].style.display = "none";
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
