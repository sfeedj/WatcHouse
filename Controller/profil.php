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












 
?>