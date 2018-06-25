<?php
include_once('bddConnect.php');

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
    return ($data);
}
function sendTrame(){
    $trame = "1"."011A"."1"."3"."01"."0050"."0005"."1B"."2018"."06"."24"."22"."34"."00";
    $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=011A&TRAME=".$trame);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    getTrames();
}

function getTrameBDD(){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->query('SELECT * FROM trame');
    $data = $req->fetchAll();
    $result = array();
    foreach($data as $row){
        $result[] = $row['ID_Trame'];
    }
    return $result;
}

function saveTrameData($trame){
    list ($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    if ($t == 1 && $r == 1){
        $bdd = $GLOBALS['bdd'];
        $timestamp = $year."-".$month."-".$day." ".$hour.":".$min.":".$sec;
        $req = $bdd->prepare("INSERT INTO mesures(id_cemac,Reference,numero_capteur,AddedOnDate,data) VALUES(?,?,?,?,?)");
        $req->execute(array($o, $c, $n, $timestamp, $v));
        $req = $bdd->prepare("INSERT INTO trame(ID_Trame) VALUES(?)");
        $req->execute(array($a));
    }
}