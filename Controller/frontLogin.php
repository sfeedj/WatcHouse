<?php

if (!isset($_POST['username']) OR !isset($_POST['password'])){
  $messageErreur='';
  require('View/frontLogin.php');
  checkID();

}

else{
  $messageErreur='';
  require('../View/frontLogin.php');
  checkID();
  // if(!checkID($_POST['username'], $_POST['password'], $bdd)){
  //   $messageErreur='Informations incorrectes.';
  //   require($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/View/frontLogin.php');
  // }
  // else{
  //   header($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/View/selectionDomicile.php');
  // }
}
?>
