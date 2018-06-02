<?php
include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/Model/profil.php');
if (isset($_SESSION['username'])) {
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/header.php');

  chargerInfosProfile($bdd,$username);
  changePassword($bdd,$username);
  changeMail($bdd,$username);
  changePhone($bdd,$username);
  changePrenom($bdd,$username);
  changeNom($bdd,$username);
  changeAdresse($bdd,$username);
  if(isset($_POST['submit_photo'])) {
    if (getimagesize($_FILES['image']['temp_name'])==FALSE) {
      echo "failed";
    }
    else {
      $name=addslashes($_FILES['image']['name']);
      $image=base64_encode(file_get_contents(addslashes($_FILES['image']['temp_name'])));
      saveimage($name,$image,$bdd);
    }
  }
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/profil.php');
}
else {
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/index.php');
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
