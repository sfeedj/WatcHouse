<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

include("View/header.php");

$req = $bdd->prepare('SELECT * FROM Users');
$req->execute();
$result = $req;
echo "<table class='tableau_client'>
	  <tr>
			 <td class='Nom'>Mes Domiciles:</td>
	  </tr>
	  ";
	  while ($donnees = $result->fetch())
	  {
	    echo "
	    <td  class='CaseDomicile'> ".$donnees["username"]."</td>
      <td class='separator'></td>
	     ";
	  }
	  echo "</table>"; ?>
