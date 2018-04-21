<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

include("../View/header.php");

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/clientsFunctions.php');

include("../View/listeClients.php");
if (isset($_POST['nomClient']) AND isset($_POST['email']) AND isset($_POST['admin']) ){
  ajouterClient($_POST['nomClient'],$_POST['email'],$_POST['admin'],$GLOBALS['bdd']);
	header("Refresh:0");
}

if (isset($_POST['nomClient']) AND isset($_POST['IDClient']) AND $_POST['IDClient'] != $_SESSION['ID'] ){
  supprimerClient($_POST['nomClient'],$_POST['IDClient'],$GLOBALS['bdd']);
	header("Refresh:1");
}

function Liste_Clients($bdd)
{
  $reqUser = $bdd->query('SELECT ID, username, AddedOnDate FROM users ');
  $reqDomiciles = $bdd->prepare('SELECT Nom,Adresse,InstalledOnDate FROM domiciles WHERE Propriétaire = ?');
  $k=0 ;
  while ($donnees = $reqUser->fetch())
  {
    $k++;
    $string= (string) $k;
    echo "
    <tr  class='ligneClient'>
    <td class = IDClient>
    <a href='#' onclick=\"affichageDomiciles($string)\">".$donnees["ID"]."</a>
    </td>
    <td '>".$donnees["username"]."</td>
    <td >".$donnees["AddedOnDate"]."</td>
    </a>
    </tr>
    ";

    $reqDomiciles->execute(array($donnees["ID"]));
    while ($Domicile = $reqDomiciles->fetch())
    {
      echo "
      <tr  class='ligneDomicile ".$k."'>
      <td  >".$Domicile["Nom"]."</td>
      <td >".$Domicile["Adresse"]."</td>
      <td >".$Domicile["InstalledOnDate"]."</td>
      </tr>
      ";
    }
  }
}

?>
