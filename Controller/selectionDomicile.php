<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/loginFunctions.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/header.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/selectionDomicile.php');

//Tableau domicile : ne pas oublié les baslises <table> dans la vue
function Tableau_Domiciles($bdd)
{
$req = $bdd->prepare('SELECT Nom,ID FROM Domiciles WHERE propriétaire = ?');
$req->execute(array($_SESSION['ID']));
$result = $req;

echo "
	  <tr>
			 <td class='titre_domiciles'>Mes Domiciles : <br/><br/></td>
	  </tr>
	  ";
	  while ($donnees = $result->fetch())
	  {
	    echo "
	    <td  class='CaseDomicile'><a href=\"../Controller/PageDomicile.php?id=".$donnees["ID"]."\"><img src = '../Style/clef.png' class = 'clef'><figcaption>".$donnees["Nom"]."</figcaption></a></td>
      <td class='separator'></td>
	     ";
	  }
}

function ajouterDomicile($bdd){

}
		?>
