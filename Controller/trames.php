<?php
include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/trame.php');



$data=getTrames();
$data = "";
$data = $data."1"."011A"."1"."3"."01"."0023"."0005"."1B"."2018"."06"."24"."22"."34"."00";
$data = $data."1"."011A"."1"."4"."01"."0030"."0006"."1B"."2018"."06"."24"."22"."34"."00";
$data = $data."1"."011A"."1"."5"."01"."0010"."0007"."1B"."2018"."06"."24"."22"."34"."00";
$data = $data."1"."011A"."1"."9"."01"."0001"."0008"."1B"."2018"."06"."24"."22"."34"."00";
$data = $data."1"."011A"."1"."3"."01"."0025"."0009"."1B"."2018"."06"."24"."22"."36"."00";
$data = $data."1"."011A"."1"."3"."01"."0018"."0010"."1B"."2018"."06"."24"."22"."32"."00";
$data = $data."1"."011A"."1"."3"."01"."0001"."0010"."1B"."2018"."06"."24"."22"."38"."00";
$data_tab= str_split($data,33);
$TabTrame=getTrameBDD();
if (count($data_tab) == count($TabTrame))
    exit();
foreach ($data_tab as $trame) {
    $a = substr($trame, 13, 4);
    if(!in_array($a, $TabTrame)){
        saveTrameData($trame);
    }
}



/*t: type de la trame, oooo: numero de l'objet, r: type de requête, c:type de capteur, NN: numero du capteur, VVVV: la valeur remontee
AAAA: numero de la trame, XX: un checksum, YYYY: annee, MM:mois, DD: jour, HH: heure, mm:minutes, ss:secondes*/
?>