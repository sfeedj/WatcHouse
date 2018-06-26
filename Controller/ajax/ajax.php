<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/bddConnect.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/trame.php');


$id = $_GET['id'];
$bdd = $GLOBALS['bdd'];

$req = $bdd->query("SELECT Etat,Reference,numero FROM capteurs WHERE UUID='$id' ");
$donnees = $req->fetch();
if ($donnees == false)
    exit();
else {
    if ($donnees['Etat'] == 0) {
        $req = $bdd->exec("UPDATE capteurs SET Etat='1' WHERE UUID='$id' ");
        sendTrame($donnees['Reference'], $donnees['numero'], '1111');
    } else {
        $req = $bdd->exec("UPDATE capteurs SET Etat='0' WHERE UUID='$id' ");
        sendTrame($donnees['Reference'], $donnees['numero'], '0000');
    }
}

?>