<?php
/**
 * Created by IntelliJ IDEA.
 * User: Laetitia
 * Date: 06/05/2018
 * Time: 12:27
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/loginFunctions.php');
if (empty($_SESSION['ID']) && empty($_SESSION['admin'])){
    header("Refresh:0; url=/../WatcHouse/");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/faq.php');
if (!empty($_GET['delete'])){
    DeleteQuestion($_GET['delete']);
    header("Location: /../WatcHouse/Controller/faq.php");
}
if (!empty($_POST['faq']) and !empty(!empty($_POST['reponse']))){
    AddAnswer($_POST['id'], $_POST['reponse'], $_SESSION['ID']);
    AddQuestionToFaq($_POST['id']);
    SendMailWithAnswer($_POST['id'], $_POST['reponse']);
    header("Location: /../WatcHouse/Controller/faq_admin.php");
}
if (!empty($_POST['private']) and !empty(!empty($_POST['reponse']))){
    SendMailWithAnswer($_POST['id'], $_POST['reponse']);
    DeleteQuestion($_POST['id']);
    header("Location: /../WatcHouse/Controller/faq_admin.php");
}
$liste_q = GetQuestionsToAnswer();
include("../View/header.php");
include("../View/faq_admin.php");
