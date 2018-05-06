<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/adminFunctions.php');

if (isset($_SESSION['ID']) && isAdmin($_SESSION['ID'],$bdd)){ // POUR LA SECURITE

  include_once("../View/headerAdmin.php");
  include_once("../View/listeModules.php");

  if (isset($_POST['nomModule']) AND isset($_POST['Prix']) AND isset($_POST['Description']) AND isset($_POST['img'])  ){
    ajouterModule($_POST['nomModule'],$_POST['Prix'],$_POST['Description'],$_POST['img'] ,$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

  if (isset($_POST['refModule']) ){
    supprimerModule($_POST['refModule'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

}
else {
  header("Refresh:0; url=/../APPwebsite2/index.php");
}


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
?>
