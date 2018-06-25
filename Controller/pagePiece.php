<?php

$GLOBALS['pieceSelect'] = $_GET['ip'];
$GLOBALS['domicileSelect'] = $_GET['id'];

include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/domicileFunctions.php');

if (isset($_SESSION['ID']) && checkProprietaire($_SESSION['ID'], $GLOBALS['domicileSelect'], $GLOBALS['bdd'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/pagePiece.php');
    include("../View/footer.php");

    // AJOUT MODULE
    if (isset($_POST['id_cemac']) && isset($GLOBALS['pieceSelect']) && isset($_POST['id_type']) && isset($_POST['numero']) && isset($_POST['nom'])) {
        ajouterModule($_POST['id_cemac'], $_POST['id_type'], $_POST['numero'], $_POST['nom'], $GLOBALS['pieceSelect']);
        echo '<meta http-equiv="refresh" content="0" />';
    }

    // SUPPRESSION MODULE
    if (isset($_POST['id_module'])) {
        supprimerModule($_POST['id_module']);
        echo '<meta http-equiv="refresh" content="0" />';
    }

} else {
    header("Refresh:0; url=/../WatcHouse/index.php");
}


function Select_Module($bdd)
{
    $req = $bdd->query('SELECT id_type, nom FROM type_capteur ORDER BY nom');
    echo "<select name='id_type'>";
    while ($donnees = $req->fetch()) {
        echo "<option value='" . $donnees["id_type"] . "'>" . $donnees["nom"] . "</option>";
    }
    echo "</select>";
}

function select_Cemac($id_domilice)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare('SELECT id_cemac,nom FROM cemac WHERE id_domicile=?');
    $req->execute(array($id_domilice));
    $data = $req->fetchAll();

    echo "<select id='select_cemac' name='id_cemac'>";
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
  <select name='id_module'>";
    while ($donnees = $req->fetch()) {
        echo "  <option value='" . $donnees["id"] . "'>" . $donnees["nom"] . "</option>";
    }
    echo "
  </select>
  ";
}

// LISTE DES MODULES SANS ACTIONNEURS
function listeModules($pieceID)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("SELECT id, id_cemac, numero, capteurs.nom AS nom, image, capteurs.id_type AS id_type, type_capteur.nom AS type_capteur, categorie 
                          FROM capteurs JOIN type_capteur ON capteurs.id_type=type_capteur.id_type 
                          WHERE id_piece=? ORDER BY nom DESC");
    $req->execute(array($pieceID));

    $k = 0;
    echo "
  <table id='tableModules'>  ";

    while ($donnees = $req->fetch()) {
        echo "
      <td  id='d" . $k . "' class='modulesWrapper'>
      <img src='" . $donnees['image'] . "' class='imageModule' style='height:100px;'>
      <p>";
        echo moduleInfo($donnees['id'], $donnees['id_cemac'], $donnees['id_type'], $donnees['numero'], $donnees['categorie']);
        echo "</p>
      <figcaption >" . $donnees["nom"] . "</figcaption>
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
    $req = $bdd->query("SELECT etat FROM capteurs WHERE id='$id'");
    while ($donnees = $req->fetch()) {
        if ($donnees['etat'] == 1) {
            return "checked";
        } else
            return "";
    }
    return "";
}


function moduleInfo($id, $id_cemac, $id_type, $numero, $categorie)
{

    if ($categorie == "Actionneur") {

        return
            '<div style="display: flex;justify-content: center;">
      <input class="cursor" type="range" id="' . $id . '" min="15" max="40" value="' . lastMesure($id_cemac, $id_type, $numero) . '" step="0.5" onchange="cursor(' . $id . ')" />
      </div>
      <div class="valeur"><div id=" ' . $id . ' ">' . lastMesure($id_cemac, $id_type, $numero) . '°C</div></div>
      <script>
      document.getElementById("' . $id . '").onchange = function() {
      document.getElementById(" ' . $id . ' ").textContent=document.getElementById("' . $id . '").value+"°C";
      }
      </script>';
    } elseif ($categorie == "Module") {
        return "Active";
    } elseif ($categorie == "On/Off") {
        $checked = isChecked($id);
        return '
    <script>
    
    window.onload = function() {
      console.log("' . $checked . '");
      }
      </script>
    <input name="cap" id="' . $id . '" class="toggle-status" onclick="go(' . $id . ')" type="checkbox"  ' . $checked . '>
    <label for="' . $id . '"  class="toggle-switch  toggle-x2 toggle-rounded"></label>
    ';
    } elseif ($categorie == "Capteur") {
        return lastMesure($id_cemac, $id_type, $numero);
    }


    return "test";
}


?>
