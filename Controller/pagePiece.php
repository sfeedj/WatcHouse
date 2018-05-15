<?php

$GLOBALS['pieceSelect']=$_GET['ip'];
$GLOBALS['domicileSelect']=$_GET['id'];

include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/header.php');
  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/pagePiece.php');
  include("../View/footer.php");

}

else{
  header("Refresh:0; url=/../WatcHouse/index.php");
}


?>
