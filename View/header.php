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
      <span id='links'><a href="../index.php?page=selectionDomicile">Accueil</a>
        <a href="../index.php?page=Catalogue">Catalogue</a>
        <a href="../index.php?page=faq">FAQ</a>
      </nav>

      <div class="menu">
      <?php echo urlImage($_SESSION['username'],$bdd)?>
        <p id="user-name-header"> <?php echo $_SESSION['username'] ?> </p>
        <ul>
          <li><a href="/../WatcHouse/index.php?page=profil">Profil</a></li>
          <li><a href="/../Watchouse/index.php?page=etatCapteurs">Etats des capteurs</a></li>
          <li><a href="/../WatcHouse/index.php?page=logOut" class="highlight">Deconnexion</a></li>
        </ul>
      </div>

    </div>

  </header>

  <noscript>
    <div style="border: 1px solid red; padding: 10px;text-align:center">
      <span style="color:red;text-align:center;"> Attention : JavaScript est desactive !</span><br/>
      <span style="color:red;text-align:center;"> Veuillez le reactiver pour une utilisation optimale de WatcHouse.</span>
    </div>
  </noscript>
