<?php
/**
 * Created by IntelliJ IDEA.
 * User: Laetitia
 * Date: 22/04/2018
 * Time: 13:13
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/loginFunctions.php');

if (empty($_SESSION["ID"])){
    header("Refresh:0; url=/../WatcHouse/");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/faq.php');
if (!empty($_POST['question'])){
    AddQuestion($_SESSION['ID'], $_POST['question']);
}
$liste_q_r=GetQuestions();
if (!empty($_SESSION['admin']) && $_SESSION['admin'] == 1){
    include("../View/headerAdmin.php");
}
else {
    include("../View/header.php");
}
include("../View/faq.php");
