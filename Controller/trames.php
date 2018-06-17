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
    return ($data);
}
function sendTrame(){
    $ch = curl_init("http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=011A&TRAME=100011301002B01251B");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    getTrames();
}

function getTrameBDD(){
    $bdd = $GLOBALS["bdd"];
    $req = $bdd->query('SELECT * FROM trame');
    return $req->fetchAll();
}

function saveTrameData(){

}

$data=getTrames();
$data_tab= str_split($data,33);
$TabTrame=getTrameBDD();
for ($i=0, $size=count($data_tab); $i<$size; $i++) {
    $trame=$data_tab[$i];
    list ($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    if(!in_array($a, $TabTrame)){

    }
}
/*t: type de la trame, oooo: numéro de l'objet, r: type de requête, c:type de capteur, NN: numéro du capteur, VVVV: la valeur remontée
AAAA: numéro de la trame, XX: un checksum, YYYY: année, MM:mois, DD: jour, HH: heure, mm:minutes, ss:secondes*/
?>