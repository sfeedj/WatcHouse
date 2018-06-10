<?php
session_start();

$GLOBALS['bdd'] = new PDO('mysql:host=localhost;dbname=watchouse;charset=utf8', 'root', '');
$username=$_SESSION['username'];






$id=$_POST['id'];

$req=$bdd->exec("UPDATE capteurs SET Etat='14' WHERE UUID='$id' ");


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