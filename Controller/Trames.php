<?php

function getTrames(){
  $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=011A");
  $fp = fopen('../example_trames.txt', "w");

  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  curl_exec($ch);
  curl_close($ch);
  fclose($fp);
}

function sendTrame(){
  $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=011A&TRAME=100011301002B01251B");

  curl_setopt($ch, CURLOPT_HEADER, 0);

  curl_exec($ch);
  curl_close($ch);
  getTrames();
}

function AlertTxt($txtPath){
  $var =  file_get_contents($txtPath);
  echo "
  <script>
  alert(".$var.")
  </script>
  ";
}

getTrames();
AlertTxt('../example_trames.txt');

?>
