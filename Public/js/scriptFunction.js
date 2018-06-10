
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





//Boite de dialogue changement de mot de passe
(function a () {
  var updateButton = document.getElementById('changePassword');
  var cancelButton = document.getElementById('annuler');
  var dialog = document.getElementById('boiteDialogue');

  // button ouvre une boite de dialogue
  updateButton.addEventListener('click', function() {
    document.getElementById('boiteDialogue').showModal();
  });
  // Bouton pour fermer la boîte de dialogue
  cancelButton.addEventListener('click', function() {
    document.getElementById('boiteDialogue').close();
  });
})();
// Vérification du niveau et de la correspondance des mots de passe
window.onload = function() {
document.forms.form_password.onsubmit = function() {
  var result = true;
  if(document.forms.form_password.oldPassword1.value!=document.forms.form_password.oldPassword2.value) {
    result = false;
	document.getElementById('message_cache1').innerHTML='Les deux mots de passe ne correspondent pas!';
  }
  if ( !document.forms.form_password.newPassword.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,),1,2,3,4,5,6,7,8,9,0,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z]/) )	{
	result = false;
	document.getElementById('message_cache2').innerHTML='le mot de passe doit contenir au moins un caractère spécial, un chiffre et une majuscule!';
  }
  else {
    result = true;
  }
  return result;
  }
}

			(function b () {
		var updateButton3 = document.getElementById('changePhoto');
		var cancelButton3 = document.getElementById('annuler3');
		// button ouvre une boite de dialogue
		updateButton3.addEventListener('click', function() {
			document.getElementById('boiteDialogue3').showModal();
		});
		// Bouton pour fermer la boîte de dialogue
		cancelButton3.addEventListener('click', function() {
			document.getElementById('boiteDialogue3').close();
		});
	})();

	console.dir(document.getElementById('submit_photo'));

	(function c() {
		var updateButton2 = document.getElementById('changeInfo');
		var cancelButton2 = document.getElementById('annuler2');
		// button ouvre une boite de dialogue
		updateButton2.addEventListener('click', function() {
			document.getElementById('boiteDialogue2').showModal();
		});
		// Bouton pour fermer la boîte de dialogue
		cancelButton2.addEventListener('click', function() {
			document.getElementById('boiteDialogue2').close();
		});
	})();
