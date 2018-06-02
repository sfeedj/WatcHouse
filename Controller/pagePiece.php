<?php

$GLOBALS['pieceSelect']=$_GET['ip'];
$GLOBALS['domicileSelect']=$_GET['id'];

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/header.php');
  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/pagePiece.php');
  include("../View/footer.php");

  // AJOUT MODULE
  if(isset($_POST['module']) && isset($GLOBALS['pieceSelect']) && isset($_POST['nomModule'])){
    ajouterModule($_POST['nomModule'],$_SESSION['ID'], $GLOBALS['pieceSelect'], $_POST['module'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

  // SUPPRESSION MODULE
  if(isset($_POST['module']) && isset($GLOBALS['pieceSelect']) && isset($_POST['supprModule'])){
    supprimerModule($_POST['module'], $GLOBALS['pieceSelect'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

}

else{
  header("Refresh:0; url=/../WatcHouse/index.php");
}


function Select_Module($bdd){
  $req = $bdd->query('SELECT Nom, Prix,Description,img,Référence FROM Catalogue ORDER BY Nom');
  echo "
  <select name='module'>";
  while ($donnees = $req->fetch()){
    echo "  <option value='".$donnees["Référence"]."'>".$donnees["Nom"]."</option>";
  }
  echo "
  </select>
  ";
}

function Select_Installed_Module($pieceID,$bdd){
  $req = $bdd->prepare('SELECT Nom, Référence,UUID FROM capteurs WHERE ID_pièce=? ORDER BY UUID DESC');
  $req->execute(array($pieceID));
  echo "
  <select name='module'>";
  while ($donnees = $req->fetch()){
    echo "  <option value='".$donnees["UUID"]."'>".$donnees["Nom"]."</option>";
  }
  echo "
  </select>
  ";
}
// LISTE DES MODULES
function listeModules($pieceID,$bdd){
  $req = $bdd->prepare('SELECT Nom, Référence FROM capteurs WHERE ID_pièce=? ORDER BY UUID DESC');
  $req->execute(array($pieceID));

  $k=0;
  echo "
  <table id='tableModules'>  ";
  
  while ($donnees = $req->fetch()){
    $reqImg = $bdd->prepare('SELECT img FROM catalogue WHERE Référence=?');
    $reqImg->execute(array($donnees['Référence']));
    $reqImg=$reqImg->fetch();

    echo "
    <td  id='d".$k."' class='modulesWrapper'>
    <img src='".$reqImg[0]."' class='imageModule' style='height:100px;'><figcaption style='text-align:center;'>".$donnees["Nom"]."</figcaption>
    </td>
    <td class='separator'></td>
    ";

    $k++;
    // if ($k >=5){
    //   echo "<tr><tr/>";
    //   $k=0;
    // }
  }
  echo "</table>";

}


?>
