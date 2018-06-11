<?php

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){ // SECURITE

  include_once("../View/header.php");
  include_once("../View/Catalogue.php");
  include("../View/footer.php");

  // COMMANDE D'ARTICLE
  if (isset($_GET['article'])){
    commanderArticle($_GET['article'],$_SESSION['ID'],$bdd);
  }

}
else {
  header("Refresh:0; url=/../WatcHouse/index.php");
}


//LISTE DES MODULES POUR PASSER UNE COMMANDE
function Select_Commande($bdd){
  $reqUser = $bdd->query('SELECT Nom, Prix,Description,img,Référence FROM Catalogue ORDER BY Nom');
  echo "
  <form action='../Controller/Catalogue.php' id='rechercheForm'>
  <select name='article'>";
  while ($donnees = $reqUser->fetch()){
    echo "  <option value='".$donnees["Nom"]."'>".$donnees["Nom"]."</option>";
  }
  echo "
  </select>
  <input type='submit' value='+' class='buyButton' >
  </form>";

}


// TABLEAU DES MODULES DISPONIBLES
function Liste_Modules($bdd)
{
  $req = $bdd->query('SELECT Nom, Prix,Description,img,Référence FROM Catalogue ORDER BY Nom');
  $k=1;
  while ($donnees = $req->fetch())
  {
    if ($k==1){
      echo "<tr  class='ligneModule'>";
    }

    echo "
    <td class = 'Module' style='width:50%;'>
    <label>
    <div id='nom'> ".$donnees["Nom"]."</div>
    <img src='".$donnees["img"]."' class='imageModule'>
    <div id='description'>".$donnees["Description"]."</div>
    <div id='prix'>Prix : ".$donnees["Prix"]."€</div>
    </label>
    </td>";
    if ($k==2){
      echo "</tr>";
      $k=0;
    }
    $k++;
  }
}


?>
