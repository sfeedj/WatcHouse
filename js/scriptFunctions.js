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
