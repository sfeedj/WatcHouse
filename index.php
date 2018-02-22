<?php

$bdd = new mysqli("localhost", "root", "", "watchouse");

if(isset($_GET['page']) && !empty($_GET['page'])) {
  $url = $_GET['page'];
}
else{
  $url = 'frontLogin';
}
require('Model/' . $url . '.php');
require('Controller/' . $url . '.php');

?>
