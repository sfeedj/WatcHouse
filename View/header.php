<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Public/Style/header.css">
  <link rel="icon" href="../Public/images/favicon.png" />
</head>

<header class="bloc-header">

  <div class="bloc">
    <span id='logo'><a href="../index.php?page=selectionDomicile"><img src="../Public/images/logoWH2.png"></a></span>
    <nav>
      <span id='links'><a href="../index.php?page=selectionDomicile">Acceuil</a>
        <a href="../index.php?page=Catalogue">Catalogue</a>
        <a href="../index.php?page=faq">FAQ</a>
        <a href="#">Notifications<span>1</span></a></span>
      </nav>

      <div class="menu">
      <img src="<?php echo $_SESSION['urlPhoto'] ?>" alt="User Image"/>
        <p id="user-name-header"> <?php echo $_SESSION['username'] ?> </p>
        <ul>
          <li><a href="/../WatcHouse/index.php?page=profil">Profil</a></li>
          <li><a href="#">Etats des capteurs</a></li>
          <li><a href="/../WatcHouse/index.php?page=logOut" class="highlight">Déconnexion</a></li>
        </ul>
      </div>

    </div>

  </header>

  <noscript>
    <div style="border: 1px solid red; padding: 10px;text-align:center">
      <span style="color:red;text-align:center;"> Attention : JavaScript est désactivé !</span><br/>
      <span style="color:red;text-align:center;"> Veuillez le réactiver pour une utilisation optimale de WatcHouse.</span>
    </div>
  </noscript>
