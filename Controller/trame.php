<?php
function getTrames(){
  $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=011A");
  $fp = fopen('../example_trames.txt', "w");
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_exec($ch);
  $data=  curl_exec($ch);
  curl_close($ch);
  fclose($fp);
  disp($data);
}
function sendTrame(){
  $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=011A&TRAME=100011301002B01251B");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  getTrames();
}
function disp($var){
  var_dump($var);
}
getTrames();
?>