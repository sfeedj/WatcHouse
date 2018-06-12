<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../WatcHouse/Public/Style/backLogin.css">
  <link rel="icon" href="../Public/images/favicon.png" />
  <script type="text/javascript" src="../Public/js/logFunction.js"></script>

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
  </div>
  <a href="/../WatcHouse/index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="/../WatcHouse/Public/images/user.png" ></a>
  <div>
  </body>
  </html>
