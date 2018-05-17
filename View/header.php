<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Public/Style/header.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

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
        <img src="../Public/images/user2.png" alt="User Image"/>
        <p> <?php echo $_SESSION['username'] ?> </p>
        <ul>
          <li><a href="#">Profil</a></li>
          <li><a href="#">Etats des capteurs</a></li>
          <li><a href="/../WatcHouse/index.php?page=logOut" class="highlight">Déconnexion</a></li>
        </ul>
      </div>

    </div>

  </header>
