<?php
session_start();

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');
$username=$_SESSION['username'];


$id=$_GET['id'];




$req = $bdd->query("SELECT Etat FROM capteurs WHERE UUID='$id' ");
  while ($donnees = $req->fetch())
  {
    if($donnees['Etat']==0){
            $req=$bdd->exec("UPDATE capteurs SET Etat='1' WHERE UUID='$id' ");
    }
    else {
            $req=$bdd->exec("UPDATE capteurs SET Etat='0' WHERE UUID='$id' ");
    }

}


echo "222";

?>