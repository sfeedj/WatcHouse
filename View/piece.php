<body>
<link rel="stylesheet" href="../Public/Style/piece.css">


<form method="post" action="/../APPwebsite/watchouse/Controller/piece.php">
<div id="bloc-capteur1">
<img class="light" src="/../APPwebsite/WatcHouse/Public/images/Modules/light2.png" alt="ligth">
<input name="lumiere1" type="checkbox" id="switch" /><label for="switch">Toggle</label>
</div>

<div id="bloc-capteur2">
<img class="Tv" src="/../APPwebsite/WatcHouse/Public/images/Modules/tv2.png" alt="tv">
<input name="tv" type="checkbox" id="switch2" onclick="submit" /><label for="switch2">Toggle</label>
</div>
</form>

<?php 

if (isset($_POST['tv'])) {
    $value_of_checkbox = $_POST['tv'];

    echo $value_of_checkbox;
}
?>

</body> 

