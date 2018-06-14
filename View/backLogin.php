<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../WatcHouse/Public/Style/backLogin.css">
  <script type="text/javascript" src="../Public/js/logFunction.js"></script>
  <script type="text/javascript" src="../Public/js/scriptFunction.js"></script>

</head>

  <body onload="randombg()">
    <div class="bande"></div>
    <div class="WelcomeMsg">
      <span >WatcHouse</span><br/>
      <span>Connexion Administrateur.</span>
      <br/>
     <img src="/../WatcHouse/Public/images/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
  <div id="connectezVous">
    <img id="connectezVousImg" src="/../appwebsite/watchouse/Public/images/login.png" alt="userLogin"> 
    <span class="messageConnexion">Connectez vous !</span>
  </div>
    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="/../WatcHouse/Controller/backLogin.php" method="post" class="formulaire">
    <div>
      <img class="LoginImg" src="/../appwebsite/watchouse/Public/images/userLogin.png" alt="userLogin"> 
      <input type="txt" name="username" placeholder=" Identifiant" required />
      </div>
      <div id="input-password">
      <img class="LoginImg" src="/../appwebsite/watchouse/Public/images/password.png" alt="password">
      <input type="password" name="password" placeholder=" Mot de passe" required />
      </div>
      <br/>
      <a href="#" class="popup"><span>Utilisez vos identifiants administrateur !</span><img src="/../WatcHouse/Public/images/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
      <a href="/../WatcHouse/index.php?page=oublieMDP">J'ai oublié mon mot de passe ! </a>
    </form>
    <button onclick="affichageInvisible('invisible')" class="mdpoublie">J'ai oublié mon mot de passe</button>
  </div>
  <a href="/../WatcHouse/index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="/../WatcHouse/Public/images/user.png" ></a>
  
  <div>
     <div class="invisible" >
        <div class = 'formWrapper'>
            <form action="../Controller/backLogin.php" method="post" class="formulaire">
                <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
                <br/>
                <span class="titre_form">Oublie de mot de passe</span><br/><br/>
                <input id='txt' type="email" name="email" placeholder=" Email" required /><br/>

                <?php
                mt_srand((float) microtime()*1000000);
                //affiche 1 nombre aléatoire entre 1000 et 10 000
                //augmentez si vous voulez 6 chiffres  10 000  et 100 000  etc....
                $captcha=mt_rand(1000, 10000);
                echo '<h1><strong>'.$captcha.'</strong></h1>';
                ?>
                <br/>
                <p>Veuillez recopier le code :</p>
                <input type="hidden" name="captcha" value="<?php echo($captcha); ?>"/>
                <input id='code' type="text" name="key" required /><br/>
                <br/>
                <br/>
                <button type="submit" class="formButton">Envoyer mail</button><br/><br/>
            </form>
        </div>
        <div class ='pageCover'></div>
    </div>
  </body>
  </html>
