<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../APPwebsite2/Style/backLogin.css">
</head>

<body>
  <div class="bande"></div>
  <div class="WelcomeMsg">
    <span >WatcHouse</span><br/>
    <span>Connexion Administrateur.</span>
    <br/>
    <img src="/../APPwebsite2/View/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
    <span class="messageConnexion">Connectez vous !</span>
    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="/../APPwebsite2/Controller/backLogin.php" method="post" class="formulaire">
      <input type="txt" name="username" placeholder=" Identifiant" required />
      <input type="password" name="password" placeholder=" Mot de passe" required />
      <br/>
      <a href="#" class="popup"><span>Utilisez vos identifiants administrateur !</span><img src="/../APPwebsite2/View/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
      <a href="/../APPwebsite2/index.php?page=oublieMDP">J'ai oublié mon mot de passe ! </a>
    </form>
  </div>
  <a href="/../APPwebsite2/index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="/../APPwebsite2/View/user.png" ></a>
  <div>    <br/>
    <div id="listePlus">
    <ul class="listePlus">
      <li>Confort</li>
      <li>Sécurité</li>
      <li>Connectivité</li>
    </ul>
    <div>
  </body>
  </html>
