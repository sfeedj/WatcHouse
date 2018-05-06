<?php
/**
 * Created by IntelliJ IDEA.
 * User: Laetitia
 * Date: 06/05/2018
 * Time: 12:27
 */



include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/loginFunctions.php');

if (empty($_SESSION['ID']) && empty($_SESSION['admin'])){
    header("Refresh:0; url=/../APPwebsite2/");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/faq.php');

if (!empty($_POST['faq']) and !empty(!empty($_POST['reponse']))){
    AddAnswer($_POST['id'], $_POST['reponse'], $_SESSION['ID']);
    AddQuestionToFaq($_POST['id']);
    SendMailWithAnswer($_POST['id'], $_POST['reponse']);
    header("Location: /../APPwebsite2/Controller/faq_admin.php");
}

$liste_q = GetQuestionsToAnswer();


include("../View/header.php");
include("../View/faq_admin.php");