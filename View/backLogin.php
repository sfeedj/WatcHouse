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
        <span class="messageConnexion">Connectez vous !</span>
        <span class="messageErreur"><?php echo $messageErreur; ?></span>
        <br/>
        <form action="/../WatcHouse/Controller/backLogin.php" method="post" class="formulaire">
            <input type="text" name="username" placeholder=" Identifiant" required />
            <input type="password" name="password" placeholder=" Mot de passe" required />
            <br/>
            <a href="#" class="popup"><span>Utilisez vos identifiants administrateur !</span><img src="/../WatcHouse/Public/images/logoInterrogation.png" alt="" class="logoInterrogation"/></a>
            <br/>
            <button type="submit" class="logButton">Connexion</button><br/><br/>
        </form>
        <button onclick="affichageInvisible('invisible')" class="mdpoublie">J'ai oublié mon mot de passe</button>
    </div>
    <a href="/../WatcHouse/index.php?page=frontLogin" class="logoAdmin" title="Accès Utilisateur"><img src="/../WatcHouse/Public/images/user.png" ></a>


    <div class="invisible" >
        <div class = 'formWrapper'>
            <form action="../Controller/backLogin.php" method="post" class="formulaire">
                <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
                <span class="titre_form">Oublie de mot de passe</span><br/><br/>
                <input id='txt' type="email" name="email" placeholder=" Email" required /><br/>
                <br/>
                <br/>
                <button type="submit" class="formButton">Envoyer mail</button><br/><br/>
            </form>
        </div>
        <div class ='pageCover'></div>
    </div>

</body>
</html>
