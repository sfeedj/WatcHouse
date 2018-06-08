<?php
session_start();

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');
$username=$_SESSION['username'];








$req=$bdd->prepare("UPDATE capteurs SET Etat='12' WHERE UUID='74' ");
$req->execute(array($_GET['id']));

die(var_dump($_GET['id']));

$req = $bdd->query("SELECT Etat FROM capteurs WHERE UUID='.$id.' ");
  while ($donnees = $req->fetch())
  {
    if($donnees['ETAT']==0){
            $req=$bdd->exec("UPDATE capteurs SET Etat='1' WHERE UUID='$id' ");
    }
    else {
            $req=$bdd->exec("UPDATE capteurs SET Etat='0' WHERE UUID='$id' ");
    }

}


echo "222";

?>