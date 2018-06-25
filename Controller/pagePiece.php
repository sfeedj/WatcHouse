<?php

$GLOBALS['pieceSelect']=$_GET['ip'];
$GLOBALS['domicileSelect']=$_GET['id'];

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID']) && checkProprietaire($_SESSION['ID'],$GLOBALS['domicileSelect'],$GLOBALS['bdd'])){
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
// LISTE DES MODULES SANS ACTIONNEURS
function listeModules($pieceID,$bdd){
  $req = $bdd->prepare("SELECT Nom, Référence, UUID, Catégorie FROM capteurs WHERE ID_pièce=?  ORDER BY UUID DESC");
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
      <img src='".$reqImg[0]."' class='imageModule' style='height:100px;'>
      <p>";
      echo moduleInfo($donnees['Référence'],$donnees['UUID'],$donnees['Catégorie']);
      echo "</p>
      <figcaption >".$donnees["Nom"]."</figcaption>
      </td>
      <td class='separator'></td>
      ";

      $k++;
      if ($k >=5){
        echo "<tr class='lineSeparator'><tr/>";
        $k=0;
      }
    }
    echo "</table>";
  }

 

  function getEtat($id) 
  {
    global $bdd;
  
    $get = $bdd->prepare('SELECT Etat from capteurs WHERE UUID = ?');
    $get->execute(array($id));
    $data = $get->fetch();
    return $data;
  }

  
  function isChecked($id) {
    global $bdd;
    $req=$bdd->query("SELECT Etat FROM capteurs WHERE UUID='$id' ");
    while ($donnees = $req->fetch())
    {
      if($donnees['Etat']==1){
        return "checked";
      }
      else 
        return "";
  }
}   





function moduleInfo($ref,$id,$categorie){


  
  if($categorie=="Actionneur") {

    return 
      '<div style="display: flex;justify-content: center;">
      <input class="cursor" type="range" id="'.$id.'" min="15" max="40" value="'.lastMesure($id,$GLOBALS["bdd"]).'" step="0.5" onchange="cursor('.$id.')" />
      </div>
      <div class="valeur"><div id=" '.$id.' ">'.lastMesure($id,$GLOBALS["bdd"]).'°C</div></div>
      <script>
      document.getElementById("'.$id.'").onchange = function() {
      document.getElementById(" '.$id.' ").textContent=document.getElementById("'.$id.'").value+"°C";
      }
      </script>';
  }

  elseif($categorie=="Module"){
    return "Active";
  }

  elseif($categorie=="On/Off"){
    $checked=isChecked($id);
    return '
    <script>
    window.onload = function() {
      console.log("'.$checked.'");
    }
      </script>
    <input name="cap" id="'.$id.'" class="toggle-status" onclick="go('.$id.')" type="checkbox"  '.$checked.'>
    <label for="'.$id.'"  class="toggle-switch  toggle-x2 toggle-rounded"></label>
    ';
  }


  elseif ($categorie=="Capteur") {
    return lastMesure($id,$GLOBALS['bdd']).uniteMesure($id,$GLOBALS["bdd"]);
  }


  return "test";
}



?>
