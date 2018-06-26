<?php
include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');
$ID=$_SESSION['ID'];

if (isset($_SESSION['ID'])) {
    
  

  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/header.php');

  chargerInfosProfile($bdd,$ID);
  urlImage($ID,$bdd);
  changePassword($bdd,$ID);
  changeMail($bdd,$ID);
  changePhone($bdd,$ID);
  changePrenom($bdd,$ID);
  changeNom($bdd,$ID);
  changeDate($bdd,$ID);


  
  include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/profil.php');

    if (!empty($_FILES)){
      $userphoto = upload($_FILES['userphoto']);
      ajouterPhoto($userphoto,$ID,$GLOBALS['bdd']);
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

function afficherDomiciles($bdd)
{
	$req = $bdd->prepare('SELECT Numero, Adresse, CodePostal,Ville FROM Domiciles WHERE proprietaire = ? ');
	$req->execute(array($_SESSION['ID']));
	$result = $req;
	$counter=0;
	while ($donnees = $result->fetch()){
    echo "
    <input class='appelation' id='AdresseF' type='text' name='AdresseF' disabled='disabled' />
    <input class='inputLong' type='text' name='Adresse' value=' ".$donnees['Numero']." ".$donnees['Adresse']." ".$donnees['CodePostal']." ".$donnees['CodePostal']." ' disabled='disabled' /></br>
    ";
		$counter++;

  }
}




?>
