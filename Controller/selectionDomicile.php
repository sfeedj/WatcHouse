<?php
include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/domicileFunctions.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/header.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/selectionDomicile.php');


if (isset($_POST['nomDomicile']) AND isset($_POST['adresseDomicile'])){
	echo $_POST['nomDomicile'].' et '.$_POST['adresseDomicile'];
  ajouterDomcile($_POST['nomDomicile'],$_POST['adresseDomicile'],$_SESSION['ID'],$GLOBALS['bdd']);
	header("Refresh:0");
}

//Tableau domicile : ne pas oublié les baslises <table> dans la vue
function Tableau_Domiciles($bdd)
{
$req = $bdd->prepare('SELECT ID, Nom FROM Domiciles WHERE propriétaire = ? ');
$req->execute(array($_SESSION['ID']));
$result = $req;

echo "
	  <tr>
			 <td class='titre_domiciles'>Mes Domiciles : <br/><br/></td>
	  </tr>
	  ";
		$counter=0;
	  while ($donnees = $result->fetch())
	  {
	    echo "
	    <td  class='CaseDomicile'>
			<a href=\"../Controller/PageDomicile.php?id=".$donnees["ID"]."\"><img src = '../Style/clef.png' class = 'clef'><figcaption>".$donnees["Nom"]."</figcaption></a>
			</td>

      <td class='separator'></td> ";

			$counter++;
			if ($counter >=5){
				echo "<tr><tr/>";
				$counter=0;
			}
	  }
}
