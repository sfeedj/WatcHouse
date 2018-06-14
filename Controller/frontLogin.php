<?php

if (session_status() == 2){
  session_destroy();
}
//pour déconnecter l'utilisateur quand il fait "précédent" jusqu'au login


include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/loginFunctions.php');


if (!isset($_POST['username']) OR !isset($_POST['password'])){
  $messageErreur='';
  include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/frontLogin.php');
}

else{
    $password=$_POST['password'];
    if (!checkID($_POST['username'],$password,$GLOBALS['bdd'])){
    $messageErreur='Identifiants incorrects.';
    include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/frontLogin.php');
  }

  else{
    $messageErreur='';
    header("Refresh:0; url=/../WatcHouse/index.php?page=selectionDomicile");
  }
  if(!empty($_POST['key']) && !empty($_POST['captcha'])){
    $key = $_POST['key'];
    $captcha = $_POST['captcha'];
    echo($key);
    echo($captcha);
    if (!empty($_POST['email']) && $captcha==$key){
        resetMdp($_POST['email']);
    }
}

include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/frontLogin.php');
?>
