<?php

session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

function ajouterDomcile($nom,$numero,$adresse,$codepostal,$ville,$pays,$proprietaire,$bdd){
  $liste='';
  $req=$bdd->prepare("INSERT INTO domiciles ( Nom, Numéro, Adresse, CodePostal, Ville, Pays, Propriétaire, Pièces) VALUES ( :Nom, :Numero, :Adresse, :CodePostal, :Ville, :Pays, :Proprietaire, :Pieces)");
  $req->execute(array(
    'Nom' =>$nom,
    'Numero' =>$numero,
    'Adresse' =>$adresse,
    'CodePostal' =>$codepostal,
    'Ville' =>$ville,
    'Pays' =>$pays,
    'Proprietaire' =>$proprietaire,
    'Pieces' =>$liste,
  ));
}

function ajoutUser($userID,$domicileID,$bdd){
  $req=$bdd->prepare("INSERT INTO userdomicile (userID, domicileID) VALUES ( :userID, :domicileID)");
  $req2=$bdd->prepare("SELECT 1 FROM userdomicile WHERE userID=? AND domicileID=?");
  $req2->execute(array($userID,$domicileID));
  $res2=$req2->fetch();

  if ($res2[1]==""){
    $req->execute(array(
      'userID' =>$userID,
      'domicileID' => $domicileID
    ));
  }
}

function supprUser($user,$domicile,$bdd){
  $req=$bdd->prepare("DELETE FROM userdomicile WHERE userID=? AND domicileID=?");
  $req->execute(array($user,$domicile));
}

function checkProprietaire($userID,$domicileID,$bdd){
  $req2=$bdd->prepare("SELECT 1 FROM domiciles WHERE Propriétaire=? AND ID=?");
  $req2->execute(array($userID,$domicileID));
  $res2=$req2->fetchAll();
  if (!isset($res2[0])){
    // echo 'false';
    return false;
  }
  // echo 'true';
  return true;
}

function supprimerDomicile($ID,$bdd){
  $req=$bdd->prepare("DELETE FROM domiciles WHERE ID=?");
  $req->execute(array($ID));
  $req=$bdd->prepare("DELETE FROM pièces WHERE Domicile_ID=:ID");
  $req->execute(array(
    'ID'=>$ID
  ));
}

function supprimerDomicileInvite($userID,$domicileID,$bdd){
  $req=$bdd->prepare("DELETE FROM userdomicile WHERE userID=? AND domicileID=?");
  $req->execute(array($userID,$domicileID));
}

function commanderArticle($nomModule,$userID,$bdd){
  $req=$bdd->prepare("INSERT INTO commandes (user_ID, article_commandé) VALUES (:userID,:article)");
  $req->execute(array(
    'userID' =>$userID,
    'article'=>$nomModule
  ));
}

function ajouterPiece($nomPiece,$domicile,$proprietaire,$bdd){
  $req=$bdd->prepare("INSERT INTO rooms (Domicile_ID,Propriétaire,Nom) VALUES ( :Domicile, :Proprietaire, :Nom)");
  $req->execute(array(
    'Domicile' =>$domicile,
    'Proprietaire' => $proprietaire,
    'Nom' => $nomPiece
  ));
}

function supprimerPiece($IDPiece,$domicile,$proprietaire,$bdd){
  $req=$bdd->prepare("DELETE FROM rooms WHERE ID=? AND Propriétaire=?");
  $req->execute(array($IDPiece,$proprietaire));
}



?>
