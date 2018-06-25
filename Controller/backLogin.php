<?php
//include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/adminFunctions.php');
if (session_status() == 2){
  session_destroy();
}

include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/loginFunctions.php');


if(!isset($_POST["username"]) && !isset($_POST['password'])){
$messageErreur='';
include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/backLogin.php');
}

else{
    $password=$_POST['password'];
    if (!checkAdmin($_POST['username'],$password,$GLOBALS['bdd'])){
    $messageErreur='Identifiants incorrects.';
    include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/backLogin.php');
  }

  else {
    header("Refresh:0; url=/../WatcHouse/index.php?page=listeClients");
  }
}
if(!empty($_POST['key']) && !empty($_POST['captcha'])){
    $key = $_POST['key'];
    $captcha = $_POST['captcha'];
    if (!empty($_POST['email']) && $captcha==$key){
        resetMdp($_POST['email']);
    }
}

 ?>
