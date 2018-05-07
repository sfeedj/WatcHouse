<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Style/headerAdmin.css">

</head>

<header class="bloc-header">

  <div class="bloc">
    <span id='logo'><a href="../index.php?page=listeClients"><img src="../Style/logoWH2.png"></a></span>

  <nav>
    <a href="../index.php?page=listeClients">Accueil</a>
    <a href="../index.php?page=listeClients">Clients</a>
    <a href="../index.php?page=listeModules">Modules</a>


  </nav>

  <div class="menu">
    <img src="../Style/user2.png" alt="User Image"/>
    <p> <?php echo $_SESSION['username'] ?> </P>
    <ul>
      <li><a href="../index.php?page=profil">Profil</a></li>
      <li><a href="../index.php?page=logOut" class="highlight">Déconnexion</a></li>
    </ul>
  </div>

</div>

</header>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script>
     var mnuTimeout = null;
     $('#pageFooter').mouseenter(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '100'}, 250); },250);
     });

     $('#pageFooter').mouseleave(function(){
        clearTimeout(mnuTimeout);
        mnuTimeout = setTimeout(function(){$('#pageFooterContent').animate({height: '30'}, 250); },250);
     });
</script>
