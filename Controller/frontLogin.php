<?php

if (session_status() == 2){
  session_destroy();
}
//pour déconnecter l'utilisateur quand il fait "précédent" jusqu'au login


include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/loginFunctions.php');


if (!isset($_POST['username']) OR !isset($_POST['password'])){
  $messageErreur='';
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/frontLogin.php');
}

else{
  if (!checkID($_POST['username'],$_POST['password'],$GLOBALS['bdd'])){
    $messageErreur='Identifiants incorrects.';
    include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/frontLogin.php');
  }

  else{
    $messageErreur='';
    header("Refresh:0; url=/../APPwebsite2/index.php?page=selectionDomicile");
  }
}

include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/frontLogin.php');
?>
