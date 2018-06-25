<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/bddConnect.php');
$username = $_SESSION['username'];


$id = $_GET['id'];
$bdd = $GLOBALS['bdd'];


$req = $bdd->query("SELECT Etat FROM capteurs WHERE UUID='$id' ");
$donnees = $req->fetch();
if ($donnees == false)
    exit();
else {
    if ($donnees['Etat'] == 0) {
        $req = $bdd->exec("UPDATE capteurs SET Etat='1' WHERE UUID='$id' ");
    } else {
        $req = $bdd->exec("UPDATE capteurs SET Etat='0' WHERE UUID='$id' ");
    }
}

?>