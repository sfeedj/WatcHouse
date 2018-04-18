<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

include("View/header.php");
include("View/selectionDomicile.php");

$req = $bdd->prepare('SELECT Nom FROM Domiciles WHERE propriétaire = ?');
$req->execute(array($_SESSION['ID']));
$result = $req;
echo "<table class='tableau_domiciles'>
	  <tr>
			 <td class='titre_domiciles'>Mes Domiciles:</td>
	  </tr>
	  ";
	  while ($donnees = $result->fetch())
	  {
	    echo "
	    <td  class='CaseDomicile'> ".$donnees["Nom"]."</td>
      <td class='separator'></td>
	     ";
	  }
	  echo "</table>"; ?>
