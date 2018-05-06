<?php
/**
 * Created by IntelliJ IDEA.
 * User: Laetitia
 * Date: 22/04/2018
 * Time: 13:13
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/loginFunctions.php');

if (empty($_SESSION["ID"])){
    header("Refresh:0; url=/../APPwebsite2/");
}

include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/faq.php');
$liste_q_r=GetQuestions();

include("../View/header.php");

include("../View/faq.php");