<?php
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/view/header.php');    
include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/watchouse/view/piece.php');

if(isset($_POST['switch'])) {
    echo $_POST['switch'];
 }

?>