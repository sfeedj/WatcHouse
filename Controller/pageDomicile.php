<?php

$GLOBALS['domicileSelect']=$_GET['id'];

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

  include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/header.php');
  include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/pageDomicile.php');


  // SUPPRESSION DOMICILE
  if (isset($_POST['supprDomicile']) AND $_POST['supprDomicile']=='delete'){
    supprimerDomicile($_GET['id'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0;url=/../APPwebsite2/index.php?page=selectionDomicile" />';
  }

  // AJOUT PIECE
  if (isset($_POST['nomPiece']) AND isset($_POST['addRoom'])){
    ajouterPiece($_POST['nomPiece'],$_GET['id'],$_SESSION['ID'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }

  // SUPPRESSION PIECE
  if (isset($_POST['IDPieceDel']) AND isset($_POST['delRoom'])){
    supprimerPiece($_POST['IDPieceDel'],$_GET['id'],$_SESSION['ID'],$GLOBALS['bdd']);
    echo '<meta http-equiv="refresh" content="0" />';
  }


  include("../View/footer.php");
}


else{
  header("Refresh:0; url=/../APPwebsite2/index.php");
}


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


function listePiece($domicileID,$bdd){
  $req = $bdd->prepare('SELECT Nom,ID FROM rooms WHERE Domicile_ID=? ORDER BY ID DESC');
  $req->execute(array($domicileID));
  $k=1;
  while ($donnees = $req->fetch())
  {
    echo "
    <div id='d".$k."' class='pieceWrapper'>
    <div class='titre titrePiece'>".$donnees["Nom"]."</div>
    <div class='pieceContainer'></div>
    </div>
    <br/>
    ";
    $k++;
  }
}


?>
