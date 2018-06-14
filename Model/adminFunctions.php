<?php
session_start();
include_once('bddConnect.php');

function ajouterClient($nom,$email,$admin,$bdd){
  $req=$bdd->prepare("INSERT INTO users (username,password,email,admin) VALUES ( :username,:password,:email, :admin)");
  $reqMail=$bdd->prepare("SELECT username FROM users WHERE email=?");
  $reqMail->execute(array($email));
  $resMail=$reqMail->fetch();
  if ($resMail == false){
    $password = genererMdp();
    $req->execute(array(
      'username' =>$nom,
      'password' => $password,
      'email' =>$email,
      'admin' =>$admin
    ));
    sendMailWithPassword($email, $nom, $password);
  }
  else{
    echo "<script>
    affichageInvisible('invisibleMail');
    </script>";
  }
}
function genererMdp($long = 8){
  $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $speciaux = '*$<>-_';
  $mdp = '';
  for ($k = 0; $k < $long; $k++){
    if ($k == round($long/2)){
      $i = mt_rand(0, strlen($speciaux));
      $c = $speciaux[$i];
    }
    else{
      $i = mt_rand(0, strlen($chaine));
      $c = $chaine[$i];
    }
    $mdp .= $c;
  }
  return $mdp;
}
function sendMailWithPassword($email, $username, $password){
    $to      = $email;
    $subject = 'Bienvenue chez vous';
    $message =
        "Bonjour " . $username . "," . "\r\n" .
        "Merci d'avoir choisi notre équipe pour votre système de domotique," . "\r\n" .
        "Vous êtes maintenant client chez Domisep," . "\r\n" .
        "Votre mot de passe provisoire est : " . $password . "\r\n" .
        "Nous vous invitons à le modifier des que possible." . "\r\n" .
        "Cordialement," . "\r\n" .
        "L'équipe Domisep";
    $headers = 'From: WatchHouse.isep@gmail.com' . "\r\n" .
        'Reply-To: WatchHouse.isep@gmail.com' . "\r\n" .
        'Content-Type: text/plain; charset = "utf8"' . "\r\n";
    mail($to, $subject, $message, $headers);
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
function ajouterModule($nomModule,$Prix,$Description,$userfile,$moduleType,$bdd){
  echo 'LOLZER'.$userfile;
  $req=$bdd->prepare("INSERT INTO catalogue (Nom, Catégorie, Prix, Description, img) VALUES ( :Nom,:Categorie,:Prix,:Description,:img)");
  $req->execute(array(
    'Nom' =>$nomModule,
    'Categorie'=>$moduleType,
    'Prix' => $Prix,
    'Description' => $Description,
    'img'=>$userfile,
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
