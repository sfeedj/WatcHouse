<?php
function ajouterClient($nom,$email,$admin,$bdd){
  $req=$bdd->prepare("INSERT INTO users (username,password,email,admin) VALUES ( :username,:password,:email, :admin)");
  $req->execute(array(
    'username' =>$nom,
  	'password' =>'password',
    'email' =>$email,
    'admin' =>$admin
  	));
}

function supprimerClient($nom,$ID,$bdd){
  $req=$bdd->prepare("DELETE FROM users WHERE username= :username AND ID = :ID");
  $req->execute(array(
    'username' =>$nom,
    'ID'=>$ID
  	));
    $req=$bdd->prepare("DELETE FROM domiciles WHERE Propriétaire=:ID");
    $req->execute(array(
      'ID'=>$ID
    	));
}

function isAdmin($id, $bdd){
  $req = $bdd->prepare('SELECT admin FROM users WHERE ID=?');
  $req->execute(array($id));
  $resultat = $req->fetch();
  if ($resultat[0]==1)
  {
    return true;
  }
  return false;
}

function ajouterModule($nomModule,$Prix,$Description,$img,$bdd){
  $req=$bdd->prepare("INSERT INTO catalogue (Nom, Catégorie, Prix,Description,img) VALUES ( :Nom,:Categorie,:Prix,:Description,:img)");
  $req->execute(array(
    'Nom' =>$nomModule,
    'Categorie'=>'Module',
  	'Prix' => $Prix,
    'Description' => $Description,
    'img'=>$img
  	));
}

function supprimerModule($Référence,$bdd){
  $req=$bdd->prepare("DELETE FROM catalogue WHERE Référence= :Ref");
  $req->execute(array(
    'Ref' =>$Référence
  	));
}

 ?>
