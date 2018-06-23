<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
    <link rel="stylesheet" href="/../WatcHouse/Public/Style/frontLog.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="../Public/js/logFunction.js"></script>
    <script type="text/javascript" src="../Public/js/scriptFunction.js"></script>
    <script type="text/javascript" src="../Public/js/scriptCaptcha.js"></script>

</head>

<body onload="randombg()">
      <div class="bande"></div>
  <div class="WelcomeMsg">
    <span >WatcHouse</span><br/>
    <span>Bienvenue chez Vous.</span>
    <br/>
    <img src="/../WatcHouse/Public/images/logoWH2.png" alt="" class="logoWH">
  </div>
  <div class="ConnectionPanel">
  <div id="connectezVous">
    <img id="connectezVousImg" src="/../watchouse/Public/images/login.png" alt="userLogin">
    <span class="messageConnexion">Connectez vous !</span>
  </div>

    <span class="messageErreur"><?php echo $messageErreur; ?></span>
    <br/>
    <form action="/../WatcHouse/Controller/frontLogin.php" method="post" class="formulaire">
      <div>
      <img class="LoginImg" src="/../watchouse/Public/images/userLogin.png" alt="userLogin">
      <input type="txt" name="username" placeholder=" Identifiant" required />
      </div>
      <div id="input-password">
      <img class="LoginImg" src="/../watchouse/Public/images/password.png" alt="password">
      <input type="password" name="password" placeholder=" Mot de passe" required />
      </div>
      <br/>
      <a href="#" class="popup"><span>Utilisez les identifiants fournis par Domisep !</span><img src="/../WatcHouse/Public/images/logoInterrogation.png" alt="" class="logoInterrogation"></a>
      <br/>
      <button type="submit" class="logButton" />Connexion</button><br/><br/>
    </form>
  <button onclick="affichageInvisible('invisible')" class="mdpoublie">J'ai oublie mon mot de passe</button>
  </div>
  <a href="/../WatcHouse/index.php?page=backLogin" class="logoAdmin"><img src="/../WatcHouse/Public/images/admin.png" ></a>
  <div>
    <br/>
    <div class="invisible" >
    <div class = 'formWrapper'>
        <form action="../Controller/frontLogin.php" method="post" class="formulaire" onsubmit="return verifyCaptcha();">
            <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
            <br/>
            <span class="titre_form">Oublie de mot de passe</span><br/><br/>
            <input id='txt' type="email" name="email" placeholder=" Email" required /><br/>
            <h1><strong id="captcha"></strong></h1>
            <p id="error"></p>
            <br/>
            <p>Veuillez recopier le code :</p>
            <input type="hidden" name="captcha" id="captcha_hidden"/>
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
