<link href="../public/style/profil.css" rel="stylesheet">
<script src="../Public/js/scriptFunctions.js"></script>

<?php 
echo $_SESSION['messagePassword'];
?>
<section id=photo-profil>
<img src="/../APPwebsite/Public/images/iniesta.jpg"alt=""></br>

</section>

<button id="changePhoto">Changer l'image</button>


<div id="container">

<form class="form1" >

<h1 id="info"> Informations personnelles</h1> 
<h2>  Login: <?php echo htmlspecialchars($_SESSION['username']) ?></h2>


<input class="appelation" id="NomF" type="text" name="NomF" value="Nom" disabled="disabled" />
<input  class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"  disabled="disabled"/>
<input class="appelation" id="PrénomF" type="text" name="PrénomF" value="Prénom" disabled="disabled" />
<input class="inputCourt" type="text" name="Prénom" value="<?php echo htmlspecialchars($_SESSION['Prénom']) ?>" disabled="disabled"  />  </br>
<input class="appelation" id="MailF" type="text" name="MailF"  disabled="disabled" />
<input class="inputLong" id="changeMail" type="text" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>" disabled="disabled" /> </br>
<input class="appelation" id="NaissanceF" type="text" name="NaissanceF" value="      " disabled="disabled" />
<input class="inputCourt" type="text" name="Dat_de_naisssance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  disabled="disabled"/>
<input class="appelation" id="TéléphoneF"  type="text" name="TéléphoneF" value="      " disabled="disabled" />
<input class="inputCourt" id="changeTel" type="text" type="button" name="Téléphone" value="<?php echo htmlspecialchars($_SESSION['Téléphone']) ?>"  disabled="disabled"/></br>
<input class="appelation" id="AdresseF" type="text" name="AdresseF" disabled="disabled" />
<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['adresse']) ?>" disabled="disabled" /></br>

<button id="changeInfo" type="button" >Changer mes Informations</button>
<button id="changePassword" type="button">Changer de mot de passe</button>

</form>

</div>


<!-- Simple boîte de dialogue, contenant un formulaire -->
<dialog id="boiteDialogue">
	<form method="post" class="form2"  onsubmit="return changePassword();">
		<section class="sectionPassword">
				<input  class="inputDialog" name="oldPassword1"  type="password" placeholder="Ancien mot de Passe" required minlength="4">
				<input  class="inputDialog" name="oldPassword2" type="password" placeholder="Confirmez l'ancien mot de Passe" required minlength="4">
				<input  class="inputDialog" name="newPassword" type="password" placeholder="Nouveau mot de Passe" required minlength="4">
		</section>
		<menu class="menuDialog">      
			<button class="annuler" id="annuler" type="reset">Annuler</button>
			<button class="confirmer" id="confirmer" type="submit"  action="/../APPwebsite/Controller/profil.php" >Confirmer</button>
		</menu>
	</form>
</dialog>



<dialog id="boiteDialogue2">

<form  method="post" class="form1" action="/../APPwebsite/Controller/profil.php">


<input class="appelation" id="NomF" type="text" name="NomF" value="Nom" disabled="disabled" />
<input class="inputCourt" type="text" name="Nom" value="<?php echo htmlspecialchars($_SESSION['Nom']) ?>"/>
<input class="appelation" id="PrénomF" type="text" name="PrénomF" value="Prénom" disabled="disabled" />
<input class="inputCourt" type="text" name="Prénom" value="<?php echo htmlspecialchars($_SESSION['Prénom']) ?>"  />  </br>
<input class="appelation" id="MailF" type="text" name="MailF"  disabled="disabled" />
<input class="inputLong" id="changeMail" type="text" type="button"  name="Mail" value="<?php echo htmlspecialchars($_SESSION['Mail']) ?>"  /></br>
<input class="appelation" id="NaissanceF" type="text" name="NaissanceF" value="      " disabled="disabled" />
<input class="inputCourt" type="text" name="Dat_de_naisssance" value="<?php echo htmlspecialchars($_SESSION['Date_de_naissance']) ?>"  />
<input class="appelation" id="TéléphoneF"  type="text" name="TéléphoneF" value="      " disabled="disabled" />
<input class="inputCourt" id="changeTel" type="text" type="button" name="Téléphone" value="<?php echo htmlspecialchars($_SESSION['Téléphone']) ?>"  /></br>
<input class="appelation" id="AdresseF" type="text" name="AdresseF"  disabled="disabled" />
<input class="inputLong" type="text" name="Adresse" value="<?php echo htmlspecialchars($_SESSION['adresse']) ?>" /></br>


		<menu class="menuDialog">      
			<button class="annuler" id="annuler2" type="reset">Annuler</button>
			<button class="confirmer" id="confirmer2" type="submit"   >Confirmer</button>
		</menu>


</form>

</dialog>


<dialog id="boiteDialogue3">
<form action="/../APPwebsite/Controller/profil.php">
            <div class="imgDrop" dropzone="link">
              <label for="file" id="dropZone"><br/></label>
              <input id="file" type="file" name="userfile"/>
            </div>

			<menu class="menuDialog">      
			<button class="annuler" id="annuler3" type="reset">Annuler</button>
			<button class="confirmer" id="confirmer3" type="submit"   >Confirmer</button>
		</menu>
</form>
</dialog>




<script>



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


</script>



