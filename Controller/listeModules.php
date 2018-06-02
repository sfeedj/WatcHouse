<?php

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/adminFunctions.php');

if (isset($_SESSION['ID']) && isAdmin($_SESSION['ID'],$bdd)){ // POUR LA SECURITE

  include_once("../View/headerAdmin.php");
  include_once("../View/listeModules.php");

  // AJOUT DE MODULE
  if (isset($_POST['nomModule']) AND isset($_POST['Prix']) AND isset($_POST['Description']) ){
    if (!empty($_FILES)){
      $userfile = upload($_FILES['userfile']);
    }
    else{
      $userfile='N/A';
    }
    ajouterModule($_POST['nomModule'],$_POST['Prix'],$_POST['Description'],$userfile,$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="2" />';
  }


  // SUPPRESSION DE MODULE
  if (isset($_POST['refModule']) ){
    supprimerModule($_POST['refModule'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }


}
else {
  echo '<meta http-equiv="refresh" content="0;URL=../index.php" />';
}


// GENERATION DE LA LISTE DES MODULES
function Liste_Modules($bdd)
{
  $reqUser = $bdd->query('SELECT Nom, Prix,Description, Référence FROM Catalogue ORDER BY Référence');
  while ($donnees = $reqUser->fetch())
  {
    echo "
    <tr  class='ligneModule'>
    <td class = 'nomMudule'>
    ".$donnees["Nom"]."
    </td>
    <td>".$donnees["Prix"]."</td>
    <td >".$donnees["Description"]."</td>
    <td class='Ref'>".$donnees["Référence"]."</td>
    </tr>
    ";
  }
}


// GENERATION DU CHAMPS SELECT DES MODULES
function Select_Module($bdd){
  $req = $bdd->query('SELECT Nom, Référence FROM Catalogue ORDER BY Nom');

  echo "
  <form action='../Controller/listeModules.php' method='post'>
  <img src='../Public/images/close.png' class='closeButton' onclick="."affichageInvisible('invisibleSuppr')".">
  <span class='titre_form'>Supprimer un module :</span><br/><br/><br/><br/>
  <select name='refModule'>";

  while ($donnees = $req->fetch()){
    echo "  <option value='".$donnees["Référence"]."'>".$donnees["Nom"]."</option>";
  }

  echo "
  </select>
  <input type='submit' value='Supprimer' class='formButton' ><br/><br/>
  </form>";
}

// UPLOAD IMAGE

function upload($index)
{
  $ds="/";
  $targetPath='../Public/images/Modules/';
  $targetFile=$targetPath.$index['name'];
  move_uploaded_file($index['tmp_name'],$targetFile);
  return $targetFile;
}

?>
