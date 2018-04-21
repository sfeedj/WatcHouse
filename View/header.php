<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Style/header.css">
</head>

<header class="bloc-header">

<div class="bloc">


  <nav>
    <a href="#"><img src="../Style/logoWH2.png"></a>
    <a href="#">Acceuil</a>
    <a href="#">Pièce</a>
    <a href="#">Notifications <span>1</span></a>
  </nav>

  <div class="menu">
    <img src="../Style/user2.png" alt="User Image"/>
    <p> <?php echo $_SESSION['username'] ?> </P>
    <ul>
      <li><a href="#">Profil</a></li>
      <li><a href="#">Etats des capteurs</a></li>
      <li><a href="/../APPwebsite2/index.php?page=logOut" class="highlight">Déconnexion</a></li>
    </ul>
  </div>

</div>

</header>

</html>
