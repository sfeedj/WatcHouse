<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="../Public/Style/headerAdmin.css">
  <link rel="icon" href="../Public/images/favicon.png" />
  <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<header class="bloc-header">

  <div class="bloc">
    <span id='logo'><a href="../index.php?page=listeClients"><img src="../Public/images/logoWH2.png"></a></span>

  <nav>
    <a href="../index.php?page=listeClients">Accueil</a>
    <a href="../index.php?page=listeClients">Clients</a>
    <a href="../index.php?page=listeModules">Modules</a>
    <a href="../index.php?page=faq_admin">FAQ</a>

  </nav>

  <div class="menu">
    <img src="../Public/images/user2.png" alt="User Image"/>
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

<noscript>
  <div style="border: 1px solid red; padding: 10px;text-align:center">
    <span style="color:red;text-align:center;"> Attention : JavaScript est désactivé !</span><br/>
    <span style="color:red;text-align:center;"> Veuillez le réactiver pour une utilisation optimale de WatcHouse.</span>
  </div>
</noscript>
