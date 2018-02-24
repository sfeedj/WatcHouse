<?php


if(isset($_GET['page']) && !empty($_GET['page'])) {
  $url = $_GET['page'];
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/Controller/' . $url . '.php');
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/Model/' . $url . '.php');
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/View/' . $url . '.php');

}
else{
  // include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/Model/frontLogin.php');
  include_once($_SERVER['DOCUMENT_ROOT'].'/APPwebsite/Controller/frontLogin.php');
}

?>
