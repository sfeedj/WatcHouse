<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="View/backLogin.css">
</head>

<body>
  <div class="WelcomeMsg">
    <span >WatcHouse</span><br/>
    <span>Connexion Administrateur.</span>
    <br/>
    <img src="View/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
    <span class="messageConnexion">Connectez vous !</span>
    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="Controller/frontLogin.php" method="post" class="formulaire">
      <input type="txt" name="username" placeholder="Identifiant" required />
      <input type="password" name="password" placeholder="Mot de passe" required />
      <br/>
      <a href="#" class="popup"><span>Utilisez vos identifiants administrateur !</span><img src="View/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
      <a href="index.php?page=oublieMDP">J'ai oublié mon mot de passe ! </a>
    </form>
  </div>
  <a href="index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="View/user.png" ></a>
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
