<?php

$GLOBALS['pieceSelect'] = $_GET['ip'];
$GLOBALS['domicileSelect'] = $_GET['id'];

include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID']) && checkProprietaire($_SESSION['ID'], $GLOBALS['domicileSelect'], $GLOBALS['bdd'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/pagePiece.php');
    include("../View/footer.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/trame.php');


    //sendTrame();

    // AJOUT MODULE
    if (isset($_POST['ID_CeMac']) && isset($GLOBALS['pieceSelect']) && isset($_POST['Reference']) && isset($_POST['numero']) && isset($_POST['Nom'])) {
        ajouterModule($_POST['Reference'], $_POST['numero'], $_POST['Nom'], $GLOBALS['pieceSelect'], $_POST['ID_CeMac']);
        echo '<meta http-equiv="refresh" content="0" />';
    }

    // SUPPRESSION MODULE
    if (isset($_POST['UUID'])) {
        supprimerModule($_POST['UUID']);
        echo '<meta http-equiv="refresh" content="0" />';
    }

} else {
    header("Refresh:0; url=pageDomicile.php?error=1&id=".$GLOBALS['domicileSelect']);
}


function Select_Module($bdd)
{
    $req = $bdd->query('SELECT Reference, Nom FROM catalogue ORDER BY Nom');
    echo "<select name='Reference'>";
    while ($donnees = $req->fetch()) {
        echo "<option value='" . $donnees["Reference"] . "'>" . $donnees["Nom"] . "</option>";
    }
    echo "</select>";
}

function select_Cemac($id_domilice)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare('SELECT id_cemac,nom FROM cemac WHERE id_domicile=?');
    $req->execute(array($id_domilice));
    $data = $req->fetchAll();

    echo "<select id='select_cemac' name='ID_CeMac'>";
    foreach ($data as $row) {
        echo "<option value='" . $row["id_cemac"] . "'>" . $row["id_cemac"] . " : " . $row["nom"] . "</option>";
    }
    echo "</select>";
}

function Select_Installed_Module($pieceID, $bdd)
{
    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_piece=? ORDER BY nom DESC');
    $req->execute(array($pieceID));
    echo "
  <select name='UUID'>";
    while ($donnees = $req->fetch()) {
        echo "  <option value='" . $donnees["UUID"] . "'>" . $donnees["Nom"] . "</option>";
    }
    echo "
  </select>
  ";
}

// LISTE DES MODULES SANS ACTIONNEURS
function listeModules($pieceID)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("SELECT img,capteurs.Nom as Nom,UUID,ID_CeMac,numero,capteurs.Categorie as Categorie 
                          FROM catalogue JOIN capteurs ON catalogue.Reference=capteurs.Reference 
                          WHERE id_piece=? ORDER BY Nom DESC");
    $req->execute(array($pieceID));

    $k = 0;
    echo "
  <table id='tableModules'>  ";

    while ($donnees = $req->fetch()) {
        echo "
      <td  id='d" . $k . "' class='modulesWrapper'>
      <img src='" . $donnees['img'] . "' class='imageModule' style='height:100px;'>
      <p>";
        echo moduleInfo($donnees['UUID'], $donnees['Categorie']);
        echo "</p>
      <figcaption >" . $donnees["Nom"] . "</figcaption>
      </td>
      <td class='separator'></td>
      ";

        $k++;
        if ($k >= 5) {
            echo "<tr class='lineSeparator'><tr/>";
            $k = 0;
        }
    }
    echo "</table>";
}


function getEtat($id)
{
    global $bdd;

    $get = $bdd->prepare('SELECT Etat FROM capteurs WHERE UUID = ?');
    $get->execute(array($id));
    $data = $get->fetch();
    return $data;
}


function isChecked($id)
{
    global $bdd;
    $req = $bdd->query("SELECT Etat FROM capteurs WHERE UUID='$id'");
    if ($req == false)
        return "";
    $data = $req->fetchAll();
    foreach ($data as $row) {
        if ($row['Etat'] == 1) {
            return "checked";
        } else
            return "";
    }
    return "";
}


function moduleInfo($UUID, $Categorie)
{

    if ($Categorie == "Actionneur") {


        return
            '<div style="display: flex;justify-content: center;">
      <input class="cursor" type="range" id="' . $UUID . '" min="15" max="40" value="' . lastMesure($UUID) . '" step="0.5" onchange="cursor(' . $UUID . ')" />
      </div>
      <div class="valeur"><div id=" ' . $UUID . ' ">' . lastMesure($UUID) . '°C</div></div>
      <script>
      document.getElementById("' . $UUID . '").onchange = function() {
        document.getElementById(" ' . $UUID . ' ").textContent=document.getElementById("' . $UUID . '").value+"°C";
      }
      </script>';
    } elseif ($Categorie == "Module") {
        return "Active";
    } elseif ($Categorie == "On/Off") {
        $checked = isChecked($UUID);
        return '
    <input name="cap" id="' . $UUID . '" class="toggle-status" onclick="go(' . $UUID . ')" type="checkbox"  ' . $checked . '>
    <label for="' . $UUID . '"  class="toggle-switch  toggle-x2 toggle-rounded"></label>
    ';
    } elseif ($Categorie == "Capteur") {
        return lastMesure($UUID);
    }


    return "test";
}


?>
