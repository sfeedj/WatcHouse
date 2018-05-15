<?php

if (session_status() == 2){
  session_destroy();
}

include_once($_SERVER['DOCUMENT_ROOT'].'/appwebsite/watchouse/Model/loginFunctions.php');


if(!isset($_POST["username"]) && !isset($_POST['password'])){
$messageErreur='';
include_once($_SERVER['DOCUMENT_ROOT'].'/appwebsite/watchouse/View/backLogin.php');
}

else{
  if (!checkAdmin($_POST['username'],$_POST['password'],$bdd)){
    $messageErreur='Identifiants incorrects.';
    include_once($_SERVER['DOCUMENT_ROOT'].'/appwebsite/watchouse/View/backLogin.php');
  }

  else {
    header("Refresh:0; url=/../appwebsite/watchouse/index.php?page=listeClients");
  }
}

 ?>
