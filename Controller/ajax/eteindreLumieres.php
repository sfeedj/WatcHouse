<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/bddConnect.php');


$id = $_GET['id'];
$bdd = $GLOBALS['bdd'];




$req = $bdd->query("SELECT Etat FROM capteurs WHERE Type='WatcHouse Smart Lightbulb' ");
$donnees = $req->fetch();
if ($donnees == false)
    exit();
else {
    if ($donnees['Etat'] == 0) {
        $req = $bdd->exec("UPDATE capteurs SET Etat='1' WHERE  Type='WatcHouse Smart Lightbulb' ");
    } else {
        $req = $bdd->exec("UPDATE capteurs SET Etat='0' WHERE  Type='WatcHouse Smart Lightbulb' ");
    }
}

?>