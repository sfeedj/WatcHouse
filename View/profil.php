<link href="../Public/style/profil.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>


<section id=photo-profil>
<?php echo urlImage($_SESSION['username'],$bdd); ?>
</section>
<button id="changePhoto" onclick="affichageInvisible('invisible3')">Changer l'image</button>


<div id="container">
<form class="form" >
<h1 id="info"> Informations personnelles</h1>
<h2>  ID : <?php echo htmlspecialchars($_SESSION['ID']) ?></h2>
		<input class="appelation" id="NomF" type="text" name="NomF" value="Nom" disabled="disabled" />
		<input  class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"  disabled="disabled"/>
		<input class="appelation" id="PrenomF" type="text" name="PrenomF" value="Prenom" disabled="disabled" />
		<input class="inputCourt" type="text" name="Prenom" value="<?php echo htmlspecialchars($_SESSION['Prenom']) ?>" disabled="disabled"  />  </br>
		<input class="appelation" id="MailF" type="text" name="MailF"  disabled="disabled" />
		<input class="inputLong"  type="text" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>" disabled="disabled" /> </br>
		<input class="appelation" id="NaissanceF" type="text" name="NaissanceF" value="      " disabled="disabled" />
		<input class="inputCourt"  name="Date_de_naissance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  disabled="disabled"/>
		<input class="appelation" id="TelephoneF"  type="text" name="TelephoneF" value="      " disabled="disabled" />
		<input class="inputCourt"  type="tel" type="button" name="Telephone" value="<?php echo htmlspecialchars($_SESSION['Telephone']) ?>"  disabled="disabled"/></br>
		<input class="appelation" id="AdresseF" type="text" name="AdresseF" disabled="disabled" />
		<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['Adresse']) ?>" disabled="disabled" /></br>
	<button id="changeInfo" type="button" onclick="affichageInvisible('invisible1')">Changer mes Informations</button>
	<button id="changePassword" type="button"  onclick="affichageInvisible('invisible2')" >Changer de mot de passe</button>
</form>
</div>


<div class="invisible1">
<form  method="post" class="form1" action="/../watchouse/Controller/profil.php">
		<input class="appelation" id="NomF2" type="text" name="NomF" value="Nom" disabled="disabled" />
		<input class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"/>
		<input class="appelation" id="PrenomF2" type="text" name="PrenomF" value="Prenom" disabled="disabled" />
		<input class="inputCourt" type="text" name="Prenom" value="<?php echo htmlspecialchars($_SESSION['Prenom']) ?>"  />  </br>
		<input class="appelation" id="MailF2" type="text" name="MailF"  disabled="disabled" />
		<input class="inputLong" type="email" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>"  /></br>
		<input class="appelation" id="NaissanceF2" type="text" name="NaissanceF" value="      " disabled="disabled" />
		<input class="inputCourt" type="date" name="Date_de_naissance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  />
		<input class="appelation" id="TelephoneF2"  type="text" name="TelephoneF" value="      " disabled="disabled" />
		<input class="inputCourt"  type="tel" type="button" name="Telephone" value="<?php echo htmlspecialchars($_SESSION['Telephone']) ?>"  /></br>
		<input class="appelation" id="AdresseF2" type="text" name="AdresseF"  disabled="disabled" />
		<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['Adresse']) ?>" /></br>
		<menu class="menuDialog">
			<button class="annuler"  id="annuler2" type="reset" onclick="affichageInvisible('invisible1')">Annuler</button>
			<button class="confirmer" id="confirmer2" type="submit"   >Confirmer</button>
		</menu>
</form>
</div>


<!-- Simple boîte de dialogue, contenant un formulaire -->

<div class="invisible2">
	<form method="post" name="form_password"  class="form2"  >
	<a class="msg" id="message_cache1"></a></br>
	<a class="msg" id="message_cache2"></a>
		<div class="sectionPassword">
				<input  class="inputDialog"  name="oldPassword1"  type="password" placeholder="Ancien mot de Passe" required minlength="8" maxlength="32">
				<input  class="inputDialog" name="oldPassword2" type="password" placeholder="Confirmez l'ancien mot de Passe" required minlength="8" maxlength="32">
				<input  class="inputDialog" name="newPassword" type="password" placeholder="Nouveau mot de Passe" required minlength="8" maxlength="32">
		</div>
		<menu class="menuDialog">
			<button class="annuler" id="annuler" type="reset" onclick="affichageInvisible('invisible2')" >Annuler</button>
			<button class="confirmer" id="confirmer" type="submit"  action="/../Controller/profil.php" >Confirmer</button>
		</menu>
	</form>
</div>


<div class="invisible3">
<form method="post" class="form2" id="form3" action="../Controller/profil.php" enctype="multipart/form-data">
            <div class="imgDrop" dropzone="link">
              <label for="file" id="dropZone"><br/></label>
			  <input id="userphoto" type="file" name="userphoto"/>
            </div>

			<menu class="menuDialog">
			<button class="annuler" id="annuler3" type="reset" onclick="affichageInvisible('invisible3')" >Annuler</button>
			<button class="confirmer" id="submit_photo" type="submit"   >Confirmer</button>
		</menu>
</form>
</div>


<script>
// Verification du niveau et de la correspondance des mots de passe
window.onload = function() {
document.forms.form_password.onsubmit = function() {
  var result = true;
  if(document.forms.form_password.oldPassword1.value!=document.forms.form_password.oldPassword2.value) {
    result = false;
	document.getElementById('message_cache1').innerHTML='-Les deux mots de passe ne correspondent pas!';
  }
  if ( !document.forms.form_password.newPassword.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)){
		if( !document.forms.form_password.newPassword.value.match(/.[1,2,3,4,5,6,7,8,9,0]/)) {
			if (!document.forms.form_password.newPassword.value.match(/.[A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z]/))	{
				result = false;
				document.getElementById('message_cache2').innerHTML='-Le mot de passe doit contenir au moins </br>un caractere special, un chiffre et une majuscule!';
			}
		 }
  }
  else {
    result = true;
  }
  return result;
  }
}
</script>
