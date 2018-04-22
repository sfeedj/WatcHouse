<?php
$GLOBALS['domicileSelect']=$_GET['id'];

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/domicileFunctions.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/header.php');

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/pageDomicile.php');


if (isset($_POST['supprDomicile']) AND $_POST['supprDomicile']=='delete'){
  supprimerDomicile($_GET['id'],$GLOBALS['bdd']);
  header("Refresh:0; url=/../APPwebsite2/index.php?page=selectionDomicile");
}

 ?>
