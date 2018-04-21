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
