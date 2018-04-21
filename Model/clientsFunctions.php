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


 ?>
