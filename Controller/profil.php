<?php
include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/Model/profil.php');
if (isset($_SESSION['username'])) {
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/header.php');

  chargerInfosProfile($bdd,$username);
  urlImage($username,$bdd);
  changePassword($bdd,$username);
  changeMail($bdd,$username);
  changePhone($bdd,$username);
  changePrenom($bdd,$username);
  changeNom($bdd,$username);
  changeAdresse($bdd,$username);

  
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/profil.php');

    if (!empty($_FILES)){
      $userphoto = upload($_FILES['userphoto']);
      ajouterPhoto($userphoto,$username,$GLOBALS['bdd']);
      echo '<meta http-equiv="refresh" content="2" />';

    }
    else{
      $userphoto='N/A';
    }
  }

else {
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/index.php');
}


function upload($index)
{
  $ds="/";
  $targetPath='../Public/images/users/';
  $targetFile=$targetPath.$index['name'];
  move_uploaded_file($index['tmp_name'],$targetFile);
  return $targetFile;
}


?>
