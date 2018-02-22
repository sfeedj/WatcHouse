<?php

if(!isset($_POST["username"]) && !isset($_POST['password'])){
$messageErreur='';
include('View/backLogin.php');
}
else {
  if(checkAdmin($_POST['password'],$_POST['username'],$bdd)){
    header('index.php?page=home');
  }
  else {
    $messageErreur='Identifiants invalides.';
    include('View/backLogin.php');
  }
}
 ?>
