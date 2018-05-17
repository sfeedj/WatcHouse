<?php

$GLOBALS['pieceSelect']=$_GET['ip'];

include($_SERVER['DOCUMENT_ROOT'].'/appwebsite/watchouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

  include($_SERVER['DOCUMENT_ROOT'].'/appwebsite/watchouse/View/header.php');
  
}

else{
  header("Refresh:0; url=/../appwebsite/watchouse/index.php");
}
?>
