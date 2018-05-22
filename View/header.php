<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Public/Style/header.css">
</head>

<header class="bloc-header">

  <div class="bloc">
    <span id='logo'><a href="../index.php?page=selectionDomicile"><img src="../Public/images/logoWH2.png"></a></span>
    <nav>
      <span id='links'><a href="../index.php?page=selectionDomicile">Acceuil</a>
        <a href="../index.php?page=Catalogue">Catalogue</a>
        <a href="../index.php?page=faq">FAQ</a>
        <a href="../index.php?page=piece">Notifications<span>1</span></a></span>
      </nav>

      <div class="menu">
        <img src="../Public/images/user2.png" alt="User Image"/>
        <p> <?php echo $_SESSION['username'] ?> </p>
        <ul>
          <li><a href="../index.php?page=profil">Profil</a></li>
          <li><a href="#">Etats des capteurs</a></li>
          <li><a href="/../appwebsite/watchouse/index.php?page=logOut" class="highlight">Déconnexion</a></li>
        </ul>
      </div>

    </div>

  </header>



</div>
</div>
</html>

<footer id="pageFooter">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <div id="pageFooterContent"><div id=rectangleInterieur>
<a>Informations <br /> WatcHouse@isep.fr<br /> </a> </br>
<img id ="imgFooter2" src="" alt="imgFooter2">
<img id ="imgFooter3" src="" alt="imgFooter3">
</footer>

<script>

     var mnuTimeout = null;
     $('#pageFooter').mouseenter(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '80'}, 250); },400);
     });

     $('#pageFooter').mouseleave(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '20'}, 250); },0);
     });
</script>

