<?php
include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){ // POUR LA SECURITE
	include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/View/selectionDomicile.php');
	// AJOUT DOMICILE
	if (isset($_POST['nomDomicile']) AND isset($_POST['numeroDomicile']) AND isset($_POST['adresseDomicile'])AND isset($_POST['codepostalDomicile'])AND isset($_POST['villeDomicile'])AND isset($_POST['paysDomicile'])){
		ajouterDomcile($_POST['nomDomicile'],$_POST['numeroDomicile'],$_POST['adresseDomicile'],$_POST['codepostalDomicile'],$_POST['villeDomicile'],$_POST['paysDomicile'],$_SESSION['ID'],$GLOBALS['bdd']);
		header("Refresh:0");
	}
	include("../View/footer.php");
}
else {
	header("Refresh:0; url=/../Watchouse/index.php");
}
//Tableau domicile : ne pas oublier les balises <table> dans la vue
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
	while ($donnees = $result->fetch()){
		echo "
		<td  class='CaseDomicile'>
		<a href=\"../Controller/PageDomicile.php?id=".$donnees["ID"]."\"><img src = '../Public/images/clef.png' class = 'clef'><figcaption>".$donnees["Nom"]."</figcaption></a>
		</td>
		<td class='separator'></td> ";
		$counter++;
		if ($counter >=5){
			echo "<tr><tr/>";
			$counter=0;
		}
	}
	// DOMICILES PARTAGES
	$req2 = $bdd->prepare('SELECT domicileID FROM userdomicile WHERE userID = ? ');
	$req2->execute(array($_SESSION['ID']));
	$result2 = $req2;
	while  ($donnee2 =$result2->fetch()) {
		$req3 = $bdd->prepare('SELECT Nom,ID FROM Domiciles WHERE ID = ? ');
		$req3->execute(array($donnee2[0]));
		$result3 = $req3;
		while ($donnees3 = $result3->fetch()){
			echo "
			<td  class='CaseDomicile'>
			<a href=\"../Controller/PageDomicile.php?id=".$donnees3["ID"]."\"><img src = '../Public/images/clef.png' class = 'clef'><figcaption>".$donnees3["Nom"]."</figcaption></a>
			</td>
			<td class='separator'></td> ";
			$counter++;
			if ($counter >=5){
				echo "<tr><tr/>";
				$counter=0;
			}
		}
	}
}
?>
