<?php

if(isset($_GET['page']) && !empty($_GET['page'])) {
  $url = $_GET['page'];
  header("Refresh:0; url=/../APPwebsite2/Controller/".$url.".php");


}
else{
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite2/Controller/frontLogin.php');
}

?>
