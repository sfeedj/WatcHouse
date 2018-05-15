<?php

if(isset($_GET['page']) && !empty($_GET['page'])) {
  $url = $_GET['page'];
  header("Refresh:0; url=/../appwebsite/watchouse/Controller/".$url.".php");


}
else{
  header("Refresh:0; url=/../appwebsite/watchouse/Controller/frontLogin.php");
}

?>
