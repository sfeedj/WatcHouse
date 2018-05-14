<?php

$GLOBALS['pieceSelect']=$_GET['ip'];

include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Model/domicileFunctions.php');

if (isset($_SESSION['ID'])){                                // POUR LA SECURITE

  include($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/View/header.php');
  include("../View/footer.php");
  
}

else{
  header("Refresh:0; url=/../APPwebsite2/index.php");
}
?>
