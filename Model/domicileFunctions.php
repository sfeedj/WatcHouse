<?php
session_start();
$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');


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


?>
