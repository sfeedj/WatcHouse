<?php

function ajouterClient($nom,$email,$admin,$bdd){
  $req=$bdd->prepare("INSERT INTO users (username,password,email,admin) VALUES ( :username,:password,:email, :admin)");
  $reqMail=$bdd->prepare("SELECT username FROM users WHERE email=?");
  $reqMail->execute(array($email));
  $resMail=$reqMail->fetch();
  if (count($resMail)==0){
    $req->execute(array(
      'username' =>$nom,
      'password' =>'password',
      'email' =>$email,
      'admin' =>$admin
    ));
  }
  else{
    echo "
    <script>
    affichageInvisible('invisibleMail');
    </script>";
  }
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

function ajouterModule($nomModule,$Prix,$Description,$userfile,$bdd){
  $req=$bdd->prepare("INSERT INTO catalogue (Nom, Catégorie, Prix, Description, img) VALUES ( :Nom,:Categorie,:Prix,:Description,:img)");
  $req->execute(array(
    'Nom' =>$nomModule,
    'Categorie'=>'Module',
    'Prix' => $Prix,
    'Description' => $Description,
    'img'=>$userfile
  ));
}

function supprimerModule($Référence,$bdd){
  $reqImg=$bdd->prepare("SELECT img FROM catalogue WHERE Référence= :Ref");
  $reqImg->execute(array('Ref'=>$Référence));
  $resultat = $reqImg->fetch();
  if (file_exists($resultat[0])){
    unlink($resultat[0]);
  }
  $req=$bdd->prepare("DELETE FROM catalogue WHERE Référence= :Ref");
  $req->execute(array(
    'Ref' =>$Référence
  ));
}

?>