<link href="../Public/style/profil.css" rel="stylesheet">
<script src="../Public/js/scriptFunction.js"></script>

<section id=photo-profil>
	
<?php echo urlImage($_SESSION['username'],$bdd);
	 ?>
</section>

<button id="changePhoto">Changer l'image</button>


<div id="container">

<form class="form1" >

<h1 id="info"> Informations personnelles</h1>
<h2>  ID : <?php echo htmlspecialchars($_SESSION['ID']) ?></h2>


<input class="appelation" id="NomF" type="text" name="NomF" value="Nom" disabled="disabled" />
<input  class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"  disabled="disabled"/>
<input class="appelation" id="PrénomF" type="text" name="PrénomF" value="Prénom" disabled="disabled" />
<input class="inputCourt" type="text" name="Prénom" value="<?php echo htmlspecialchars($_SESSION['Prénom']) ?>" disabled="disabled"  />  </br>
<input class="appelation" id="MailF" type="text" name="MailF"  disabled="disabled" />
<input class="inputLong"  type="text" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>" disabled="disabled" /> </br>
<input class="appelation" id="NaissanceF" type="text" name="NaissanceF" value="      " disabled="disabled" />
<input class="inputCourt"  name="Date_de_naissance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  disabled="disabled"/>
<input class="appelation" id="TéléphoneF"  type="text" name="TéléphoneF" value="      " disabled="disabled" />
<input class="inputCourt"  type="tel" type="button" name="Téléphone" value="<?php echo htmlspecialchars($_SESSION['Téléphone']) ?>"  disabled="disabled"/></br>
<input class="appelation" id="AdresseF" type="text" name="AdresseF" disabled="disabled" />
<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['Adresse']) ?>" disabled="disabled" /></br>

<button id="changeInfo" type="button" >Changer mes Informations</button>
<button id="changePassword" type="button" >Changer de mot de passe</button>




</form>

</div>


<!-- Simple boîte de dialogue, contenant un formulaire -->
<dialog id="boiteDialogue">
	<form method="post" name="form_password"  class="form2"  >
	<a class="msg" id="message_cache1"></a></br>
	<a class="msg" id="message_cache2"></a>

		<section class="sectionPassword">

				<input  class="inputDialog"  name="oldPassword1"  type="password" placeholder="Ancien mot de Passe" required minlength="4">
				<input  class="inputDialog" name="oldPassword2" type="password" placeholder="Confirmez l'ancien mot de Passe" required minlength="4">
				<input  class="inputDialog" name="newPassword" type="password" placeholder="Nouveau mot de Passe" required minlength="4">
		</section>
		<menu class="menuDialog">
			<button class="annuler" id="annuler" type="reset">Annuler</button>
			<button class="confirmer" id="confirmer" type="submit"  action="/../Controller/profil.php" >Confirmer</button>
		</menu>
	</form>
</dialog>



<dialog id="boiteDialogue2">

<form  method="post" class="form1" action="/../watchouse/Controller/profil.php">

<input class="appelation" id="NomF2" type="text" name="NomF" value="Nom" disabled="disabled" />
<input class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"/>
<input class="appelation" id="PrénomF2" type="text" name="PrénomF" value="Prénom" disabled="disabled" />
<input class="inputCourt" type="text" name="Prénom" value="<?php echo htmlspecialchars($_SESSION['Prénom']) ?>"  />  </br>
<input class="appelation" id="MailF2" type="text" name="MailF"  disabled="disabled" />
<input class="inputLong" type="email" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>"  /></br>
<input class="appelation" id="NaissanceF2" type="text" name="NaissanceF" value="      " disabled="disabled" />
<input class="inputCourt" type="date" name="Date_de_naissance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  />
<input class="appelation" id="TéléphoneF2"  type="text" name="TéléphoneF" value="      " disabled="disabled" />
<input class="inputCourt"  type="tel" type="button" name="Téléphone" value="<?php echo htmlspecialchars($_SESSION['Téléphone']) ?>"  /></br>
<input class="appelation" id="AdresseF2" type="text" name="AdresseF"  disabled="disabled" />
<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['Adresse']) ?>" /></br>


		<menu class="menuDialog">
			<button class="annuler" id="annuler2" type="reset">Annuler</button>
			<button class="confirmer" id="confirmer2" type="submit"   >Confirmer</button>
		</menu>


</form>

</dialog>


<dialog id="boiteDialogue3">
<form method="post" action="../Controller/profil.php" enctype="multipart/form-data">
            <div class="imgDrop" dropzone="link">
              <label for="file" id="dropZone"><br/></label>
			  <input id="userphoto" type="file" name="userphoto"/>
            </div>

			<menu class="menuDialog">
			<button class="annuler" id="annuler3" type="reset">Annuler</button>
			<button class="confirmer" id="submit_photo" type="submit"   >Confirmer</button>
		</menu>
</form>
</dialog>




<script>

//Boite de dialogue changement de mot de passe
(function() {
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
	document.getElementById('message_cache2').innerHTML='le mot de passe doit contenir au moins </br>un caractère spécial, un chiffre et une majuscule!';
  }
  else {
    result = true;
  }
  return result;
  }
}
</script>
<script>
			(function() {
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
	</script>

	<script>
	(function() {
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
</script>
