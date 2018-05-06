<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../APPwebsite2/Style/frontLog.css">
  <script type="text/javascript" src="../js/logFunction.js"></script>

</head>

<body onload="randombg()">
      <div class="bande"></div>
  <div class="WelcomeMsg">
    <span >WatcHouse</span><br/>
    <span>Bienvenue chez Vous.</span>
    <br/>
    <img src="/../APPwebsite2/View/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
    <span class="messageConnexion">Connectez vous !</span>
    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="/../APPwebsite2/Controller/frontLogin.php" method="post" class="formulaire">
      <input type="txt" name="username" placeholder=" Identifiant" required />
      <input type="password" name="password" placeholder=" Mot de passe" required />
      <br/>
      <a href="#" class="popup"><span>Utilisez les identifiants fournis par Domisep !</span><img src="/../APPwebsite2/View/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
      <a href="/../APPwebsite2/index.php?page=oublieMDP">J'ai oublié mon mot de passe ! </a>
    </form>
  </div>
  <a href="/../APPwebsite2/index.php?page=backLogin" class="logoAdmin"><img src="/../APPwebsite2/View/admin.png" ></a>
  <div>
    <br/>
  </body>
  </html>
