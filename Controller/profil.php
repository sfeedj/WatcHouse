<?php


include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/Model/profil.php');


if (isset($_SESSION['username'])) {

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/view/header.php');

chargerInfosProfile($bdd,$username);
changePassword($bdd,$username);
changeMail($bdd,$username);
changePhone($bdd,$username);
changePrenom($bdd,$username);
changeNom($bdd,$username);
changeAdresse($bdd,$username);




include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/view/profil.php');






}

else {
    include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/index.php');
}


if (!empty($_FILES)){
    $userfile = upload($_FILES['userfile']);

}
function uploadPhotoProfil($index)
{
  $ds="/";
  $targetPath='../Public/images/users/';
  $targetFile=$targetPath.$index['name'];
  move_uploaded_file($index['tmp_name'],$targetFile);
  return $targetFile;
}






 
?>