<?php

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');
include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/Model/frontLogin.php');


if (!isset($_POST['username']) OR !isset($_POST['password'])){
  $messageErreur='';
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/View/frontLogin.php');
}

else{
  if (! checkID($_POST['username'],$_POST['password'],$GLOBALS['bdd'])){
    $messageErreur='Identifiants incorrects.';
    include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/View/frontLogin.php');
  }

  else{
    header("Refresh:0; url=/../APPwebsite/index.php?page=selectionDomicile");
  }
}

?>
