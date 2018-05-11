<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', 'root');


function ajouterDomcile($nom,$adresse,$proprietaire,$bdd){
  $liste='';
  $req=$bdd->prepare("INSERT INTO domiciles ( Nom, Adresse, Propriétaire, Pièces) VALUES ( :Nom, :Adresse, :Proprietaire, :Pieces)");
  $req->execute(array(
  	'Nom' =>$nom,
    'Adresse' => $adresse,
  	'Proprietaire' => $proprietaire,
  	'Pieces' => $liste
  	));
}

function supprimerDomicile($ID,$bdd){
  $req=$bdd->prepare("DELETE FROM domiciles WHERE ID=?");
  $req->execute(array($ID));
    // $req=$bdd->prepare("DELETE FROM pièces WHERE domicle=:ID");
    // $req->execute(array(
    //   'ID'=>$ID
    // 	));
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
