<?php

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/adminFunctions.php');

if (isset($_SESSION['ID']) && isAdmin($_SESSION['ID'],$bdd)){ // POUR LA SECURITE
  include_once("../View/headerAdmin.php");
  include_once("../View/listeClients.php");

  //AJOUT DE CLIENT
  if (isset($_POST['nomClient']) AND isset($_POST['email']) AND isset($_POST['admin']) ){
    ajouterClient($_POST['nomClient'],$_POST['email'],$_POST['admin'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="5" />';

  }

  //SUPPRESSION DE CLIENT
  if (isset($_POST['nomClient']) AND isset($_POST['IDClient']) AND $_POST['IDClient'] != $_SESSION['ID'] ){
    supprimerClient($_POST['nomClient'],$_POST['IDClient'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

}
else {
  header("Refresh:0; url=/../WatcHouse/index.php");
}


// RECHERCHE CLIENT
function rechercheClient($nom,$bdd){
  $reqUser = $bdd->prepare('SELECT username, email, admin, AddedOnDate FROM users WHERE ID=?');
  $reqUser->execute(array($nom));
  $reqDomiciles = $bdd->prepare('SELECT Nom, Adresse, InstalledOnDate FROM domiciles WHERE Proprietaire=? ');
  $reqDomiciles->execute(array($nom));
  $reqPieces = $bdd->prepare('SELECT Nom, Domicile_ID, AddedOnDate FROM rooms WHERE Proprietaire=? ');
  $reqPieces->execute(array($nom));
  $reqCapteurs= $bdd->prepare('SELECT Nom, Reference, ID_piece, AddedOnDate, UUID FROM capteurs WHERE ID_proprietaire=? ');
  $reqCapteurs->execute(array($nom));
  $reqCom= $bdd->prepare('SELECT ID, article_commande, AddedOnDate FROM commandes WHERE user_ID=? ORDER BY AddedOnDate DESC');
  $reqCom->execute(array($nom));


  if(!$nom){
    echo'';
  }
  else {
    $donnees = $reqUser->fetch();

    echo "
    <td style='vertical-align:top;'>
    <p class='searchCategory'>----- UTILISATEUR -----</p><br/>
    Username : ".$donnees["username"]."<br/>
    Mail : ".$donnees["email"]."<br/>
    admin : ".$donnees["admin"]."<br/>
    Date d'inscription : ".$donnees["AddedOnDate"]."<br/><br/>
    ";

    echo "
    <p class='searchCategory'>----- DOMICILES -----</p><br/>";
    while ($donneesDom = $reqDomiciles->fetch()){
      echo "
      Nom Domicile : ".$donneesDom["Nom"]."<br/>
      Adresse : ".$donneesDom["Adresse"]."<br/>
      Date d'installation : ".$donneesDom["InstalledOnDate"]."<br/><br/>
      ";
    }

    echo "
    <p class='searchCategory'>----- PIECES -----</p><br/>";
    while (  $donneesPieces = $reqPieces->fetch()){
      echo "
      Nom : ".$donneesPieces["Nom"]."<br/>
      Domicile_ID : ".$donneesPieces["Domicile_ID"]."<br/>
      Date d'ajout : ".$donneesPieces["AddedOnDate"]."<br/><br/>
      ";
    }

    echo "
    <p class='searchCategory'>----- CAPTEURS -----</p><br/>";
    while ( $donneesCapteurs = $reqCapteurs->fetch()){
      echo "
      Nom : ".$donneesCapteurs["Nom"]."<br/>
      Reference : ".$donneesCapteurs["Reference"]."<br/>
      ID_piece : ".$donneesCapteurs["ID_piece"]."<br/>
      Date d'installation : ".$donneesCapteurs["AddedOnDate"]."<br/>
      UUID : ".$donneesCapteurs["UUID"]."<br/><br/>
      ";

    }

    echo "</td>
    <td style='vertical-align:top;'> ";
    echo "
    <p class='searchCategory'>----- COMMANDES -----</p><br/>";
    while ( $donneesCom = $reqCom->fetch()){
      echo "
      ID Commande: ".$donneesCom["ID"]."<br/>
      Reference : ".$donneesCom["article_commande"]."<br/>
      Date de commande : ".$donneesCom["AddedOnDate"]."<br/><br/>
      ";
    }
    echo "</td>";

  }

}



//GENERER UN TABLEAU DES CLIENTS
function Liste_Clients($bdd)
{
  $reqUser = $bdd->query('SELECT ID, username,admin, AddedOnDate FROM users ORDER BY ID ');
  $reqDomiciles = $bdd->prepare('SELECT Nom,Adresse,InstalledOnDate FROM domiciles WHERE Proprietaire = ?');
  $k=0 ;
  while ($donnees = $reqUser->fetch())
  {
    $k++;
    $string= (string) $k;
    echo "
    <tr  class='ligneClient'>
    <td class = IDClient>
    <a class = 'expand' href='#' onclick=\"affichageDomiciles($string)\">".$donnees["ID"]."</a>
    </td>
    <td '>".$donnees["username"]."</td>" ;

    if($donnees["admin"]==1){
      echo"<td >Admin</td>";
    }
    else{
      echo"<td >User</td>";
    }
    echo "
    <td >".$donnees["AddedOnDate"]."</td>
    </tr>
    ";

    $reqDomiciles->execute(array($donnees["ID"]));
    while ($Domicile = $reqDomiciles->fetch())
    {
      echo "
      <tr  class='ligneDomicile ".$k."'>
      <td  ><b>Nom : </b>".$Domicile["Nom"]."</td>
      <td ><b>Adresse : </b>".$Domicile["Adresse"]."</td>
      <td ><b>Date d'installation : </b>".$Domicile["InstalledOnDate"]."</td>
      </tr>
      ";
    }
  }
}
?>
