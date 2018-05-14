<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../APPwebsite2/Public/Style/backLogin.css">
  <script type="text/javascript" src="../Public/js/logFunction.js"></script>

</head>

  <body onload="randombg()">
  <div class="bande"></div>
  <div class="WelcomeMsg">
    <span >WatcHouse</span><br/>
    <span>Connexion Administrateur.</span>
    <br/>
    <img src="/../APPwebsite2/Public/images/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
    <span class="messageConnexion">Connectez vous !</span>
    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="/../APPwebsite2/Controller/backLogin.php" method="post" class="formulaire">
      <input type="txt" name="username" placeholder=" Identifiant" required />
      <input type="password" name="password" placeholder=" Mot de passe" required />
      <br/>
      <a href="#" class="popup"><span>Utilisez vos identifiants administrateur !</span><img src="/../APPwebsite2/Public/images/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
      <a href="/../APPwebsite2/index.php?page=oublieMDP">J'ai oublié mon mot de passe ! </a>
    </form>
  </div>
  <a href="/../APPwebsite2/index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="/../APPwebsite2/Public/images/user.png" ></a>
  <div>
  </body>
  </html>
