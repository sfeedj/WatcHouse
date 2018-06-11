<?php
session_start();

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');

function checkID($username, $password, $bdd){
  $req = $bdd->prepare('SELECT ID, password FROM users WHERE username = ?');
  $req->execute(array($username));
  $resultat = $req->fetch();

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = ($password==$resultat['password'])?true:false;

  if (!$resultat)
  {
    return false;
  }
  else
  {
    if ($isPasswordCorrect) {
      $_SESSION['ID'] = $resultat['ID'];
      $_SESSION['username'] = $username;
      return true;
    }
    return false;
  }
}

function checkAdmin($username, $password, $bdd){
  $req = $bdd->prepare('SELECT ID, password,admin FROM users WHERE username = ?');
  $req->execute(array($username));
  $resultat = $req->fetch();

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = ($password==$resultat['password'])?true:false;

  if (!$resultat)
  {
    return false;
  }
  else{
    if ($isPasswordCorrect AND $resultat['admin']==1) {
      $_SESSION['ID'] = $resultat['ID'];
      $_SESSION['username'] = $username;
      $_SESSION['admin'] = 1;
      return true;
    }
    return false;
  }
}

?>
