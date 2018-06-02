<?php
session_start();

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', 'ISEP');
$username=$_SESSION['username'];

function chargerInfosProfile($bdd,$username) {
  $req = $bdd->query('SELECT * FROM users WHERE username="'.$username.'"');
  while ($donnees = $req->fetch())
  {
    $_SESSION['ID']=$donnees['ID'];
    $_SESSION['username']=$donnees['username'];
    $_SESSION['Nom']=$donnees['Nom'];
    $_SESSION['password']=$donnees['password'];
    $_SESSION['Prénom']=$donnees['Prénom'];
    $_SESSION['Date_de_naissance']=$donnees['Date_de_naissance'];
    $_SESSION['Mail']=$donnees['Mail'];
    $_SESSION['Téléphone']=$donnees['Téléphone'];
    $_SESSION['Adresse']=$donnees['adresse'];
  }
}

function changePassword($bdd,$username) {
  if ( isset($_POST['oldPassword1']) && isset($_POST['oldPassword2']) && isset($_POST['newPassword']) && $_POST['oldPassword1']==$_POST['oldPassword2']   && $_POST['oldPassword1']!=$_POST['newPassword']) {

    $newPassword=$_POST['newPassword'];
    $bdd->exec( " UPDATE users SET password='$newPassword'  WHERE username='$username' ");
  }
}

function changeNom($bdd,$username) {
  if (  isset($_POST['Nom']) &&  $_POST['Nom']!=$_SESSION['Nom'] )  {
    $Nom=$_POST['Nom'];
    $_SESSION['Nom']=$Nom;

    $bdd->exec(" UPDATE users SET Nom='$Nom' WHERE username='$username' ");

  }

}
function changeAdresse($bdd,$username) {
  if (  isset($_POST['Adresse']) &&  $_POST['Adresse']!=$_SESSION['Adresse'] )  {
    $Adresse=$_POST['Adresse'];
    $_SESSION['Adresse']=$Adresse;

    $bdd->exec(" UPDATE users SET Adresse='$Adresse' WHERE username='$username' ");

  }

}
function changeMail($bdd,$username) {
  if (  isset($_POST['Mail'])   ) {
    $Mail=$_POST['Mail'];
    $_SESSION['Mail']=$Mail;
    $bdd->exec(" UPDATE users SET Mail='$Mail' WHERE username='$username' ");
  }
}
function changePrenom($bdd,$username) {
  if (  isset($_POST['Prénom']) ) {

    $newPrénom=$_POST['Prénom'];
    $_SESSION['Prénom']=$newPrénom;
    $bdd->exec(" UPDATE users SET Téléphone='$newPrénom' WHERE username='$username' ");

  }

}
function changePhone($bdd,$username) {
  if (  isset($_POST['Téléphone']) ) {
    $Téléphone=$_POST['Téléphone'];
    $_SESSION['Téléphone']=$Téléphone;
    $bdd->exec(" UPDATE users SET Téléphone='$Téléphone' WHERE username='$username' ");
  }
}
function save($image,$name,$bdd) {
  $req=$bdd->prepare("INSERT INTO users (image,name) VALUES ( :image, :name)");
  $req->execute(array(
    'image' =>$image,
    'name' => $name,
  ));
}
?>
