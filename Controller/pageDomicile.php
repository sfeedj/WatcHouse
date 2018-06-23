<?php

if (! isset($_GET['id'])){
  header("Refresh:0; url=/../WatcHouse/index.php?page=selectionDomicile");// POUR LA SECURITE
}
else{
  $GLOBALS['domicileSelect']=$_GET['id'];


  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');

  if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

    $statut = 'Invite';

    if(checkProprietaire($_SESSION['ID'],$_GET['id'],$GLOBALS['bdd'])){
      $statut = 'Proprietaire';
    }

    include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/header.php');
    include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Controller/statsGeneral.php');
    include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/pageDomicile.php');

    // SUPPRESSION DOMICILE
    // POUR LE PROPRIETAIRE
    if (isset($_POST['supprDomicile']) AND $_POST['supprDomicile']=='delete'){
      if (checkProprietaire($_SESSION['ID'],$_GET['id'],$GLOBALS['bdd'])) {
        supprimerDomicile($_GET['id'],$GLOBALS['bdd']);
        echo '<meta http-equiv="refresh" content="0;url=/../WatcHouse/index.php?page=selectionDomicile" />';
      }
      // POUR UN UTILISATEUR SECONDAIRE
      else{
        supprimerDomicileInvite($_SESSION['ID'],$_GET['id'],$GLOBALS['bdd']);
        echo '<meta http-equiv="refresh" content="0;url=/../WatcHouse/index.php?page=selectionDomicile" />';
      }
    }

    // AJOUT PIECE
    if (isset($_POST['nomPiece']) AND isset($_POST['addRoom']) AND isset($_POST['surface'])){
      ajouterPiece($_POST['nomPiece'],$_POST['surface'],$_GET['id'],$_SESSION['ID'],$GLOBALS['bdd']);
      echo '<meta http-equiv="refresh" content="0" />';
    }

    // SUPPRESSION PIECE
    if (isset($_POST['IDPieceDel']) AND isset($_POST['delRoom'])){
      supprimerPiece($_POST['IDPieceDel'],$_GET['id'],$_SESSION['ID'],$GLOBALS['bdd']);
      echo '<meta http-equiv="refresh" content="0" />';
    }

    // AJOUT UTILISATEUR
    if (isset($_POST['AddUserID']) AND isset($_POST['Domicile'])){
      $domicile=$GLOBALS['domicileSelect'];
      ajoutUser($_POST['AddUserID'],$domicile,$bdd);
      echo '<meta http-equiv="refresh" content="0" />';
    }

    // SUPPRESSION UTILISATEUR
    if (isset($_POST['delUser']) AND isset($_POST['Domicile'])){
      $domicile=$GLOBALS['domicileSelect'];
      supprUser($_POST['delUser'],$domicile,$bdd);
      echo '<meta http-equiv="refresh" content="0" />';
    }

    // FOOTER
    include("../View/footer.php");
  }

  else{
    // REDIRECTION SI NON DROITS D'ACCES
    header("Refresh:0; url=/../WatcHouse/index.php");
  }
}

// SELECTION D'UNE PIECE
function Select_Piece($domicileID,$bdd){
  $req = $bdd->prepare('SELECT Nom,ID FROM rooms WHERE Domicile_ID=? ORDER BY Nom');
  $req->execute(array($domicileID));
  echo "
  <select name='IDPieceDel'>";
  while ($donnees = $req->fetch()){
    echo "  <option value='".$donnees["ID"]."'>".$donnees["Nom"]."</option>";
  }
  echo "
  </select>";
}

// SELECTION D'UN UTILISATEUR
function Select_User($domicileID,$bdd){
  $req = $bdd->prepare('SELECT userID FROM userdomicile WHERE domicileID=?');
  $req->execute(array($domicileID));
  $req2 = $bdd->prepare('SELECT username FROM users WHERE ID=?');

  echo "
  <select name='delUser'>";
  while ($donnees = $req->fetch()){
    $req2->execute(array($donnees["userID"]));
    $resName=$req2->fetch();

    echo "  <option value='".$donnees["userID"]."'>".$resName[0]."</option>";
  }
  echo "
  </select>";
}

// LISTE DES PIECES
function listePiece($domicileID,$bdd){
  $req = $bdd->prepare('SELECT Nom,ID FROM rooms WHERE Domicile_ID=? ORDER BY ID DESC');
  $req->execute(array($domicileID));
  $k=1;
  while ($donnees = $req->fetch())
  {
    echo "
    <div id='d".$k."' class='pieceWrapper'>
    <a href='../Controller/pagePiece.php?id=".$GLOBALS['domicileSelect']."&ip=".$donnees["ID"]."'>
    <div class='titre titrePiece'>".$donnees["Nom"]."</div>
    </a>
    <div class='pieceContainer'>";
    listeModulesInline($donnees["ID"],$GLOBALS['bdd']);
    echo "</div>
    </div>
    <br/>
    ";
    $k++;
  }
}

function listeModulesInline($pieceID,$bdd){
  $req = $bdd->prepare("SELECT Nom, Reference, UUID, Categorie FROM capteurs WHERE ID_piece=? AND Categorie != 'Actionneur' ORDER BY UUID DESC");
  $req->execute(array($pieceID));

  $k=0;

  while ($donnees = $req->fetch()){
    $reqImg = $bdd->prepare('SELECT img FROM catalogue WHERE Reference=?');
    $reqImg->execute(array($donnees['Reference']));
    $reqImg=$reqImg->fetch();

      echo "
      <div  id='d".$k."' class='modulesWrapper'>
      <img src='".$reqImg[0]."' class='imageModule' style='height:70px;'>
      <p>";
      echo moduleInfo($donnees['Reference'],$donnees['UUID'],$donnees['Categorie']);
      echo "</p>
      <figcaption >".$donnees["Nom"]."</figcaption>
      </div>
      ";

    }
    $k++;
  }

function moduleInfo($ref,$id,$categorie){
  if($categorie=="Module"){
    return "Active";
  }
  elseif ($categorie=="Capteur") {
    return lastMesure($id,$GLOBALS['bdd'] );
  }
  return "test";
}



?>
