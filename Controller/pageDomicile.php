<?php

if (!isset($_GET['id'])) {
    header("Refresh:0; url=/../WatcHouse/index.php?page=selectionDomicile");// POUR LA SECURITE
} else {
    $GLOBALS['domicileSelect'] = $_GET['id'];


    include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Model/domicileFunctions.php');

    if (isset($_SESSION['ID'])) {                                // POUR LA SECURITE

        $statut = 'Invite';

        if (checkProprietaire($_SESSION['ID'], $_GET['id'], $GLOBALS['bdd'])) {
            $statut = 'Proprietaire';
        }

        $liste_cemac = listeCemac($GLOBALS['domicileSelect']);



        // SUPPRESSION DOMICILE
        // POUR LE PROPRIETAIRE
        if (isset($_POST['supprDomicile']) AND $_POST['supprDomicile'] == 'delete') {
            if (checkProprietaire($_SESSION['ID'], $_GET['id'], $GLOBALS['bdd'])) {
                supprimerDomicile($_GET['id'], $GLOBALS['bdd']);
                echo '<meta http-equiv="refresh" content="0;url=/../WatcHouse/index.php?page=selectionDomicile" />';
                exit();
            } // POUR UN UTILISATEUR SECONDAIRE
            else {
                supprimerDomicileInvite($_SESSION['ID'], $_GET['id'], $GLOBALS['bdd']);
                echo '<meta http-equiv="refresh" content="0;url=/../WatcHouse/index.php?page=selectionDomicile" />';
                exit();
            }
        }

        // AJOUT PIECE
        if (isset($_POST['nomPiece']) AND isset($_POST['addRoom']) AND isset($_POST['surface'])) {
            ajouterPiece($_POST['nomPiece'], $_POST['surface'], $_GET['id'], $_SESSION['ID'], $GLOBALS['bdd']);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        // SUPPRESSION PIECE
        if (isset($_POST['IDPieceDel']) AND isset($_POST['delRoom'])) {
            supprimerPiece($_POST['IDPieceDel'], $_GET['id'], $_SESSION['ID'], $GLOBALS['bdd']);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        // AJOUT UTILISATEUR
        if (isset($_POST['AddUserID']) AND isset($_POST['Domicile'])) {
            $domicile = $GLOBALS['domicileSelect'];
            ajoutUser($_POST['AddUserID'], $domicile, $bdd);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        // SUPPRESSION UTILISATEUR
        if (isset($_POST['delUser']) AND isset($_POST['Domicile'])) {
            $domicile = $GLOBALS['domicileSelect'];
            supprUser($_POST['delUser'], $domicile, $bdd);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        // AJOUT CEMAC
        if (isset($_POST['idCemac']) AND isset($_POST['nomCemac'])) {
            $domicile = $GLOBALS['domicileSelect'];
            ajouterCemac($_POST['idCemac'], $_POST['nomCemac'], $domicile);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        // SUPPRESSION CEMAC
        if (isset($_POST['delCemac']) AND isset($_POST['id_domicile'])) {
            $domicile = $GLOBALS['domicileSelect'];
            supprimerCemac($_POST['id_cemac'], $domicile);
            echo '<meta http-equiv="refresh" content="0" />';
            exit();
        }

        include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/header.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/Controller/statsGeneral.php');
        include($_SERVER['DOCUMENT_ROOT'] . '/WatcHouse/View/pageDomicile.php');


        // FOOTER
        include("../View/footer.php");
    } else {
        // REDIRECTION SI NON DROITS D'ACCES
        header("Refresh:0; url=/../WatcHouse/index.php");
    }
}

// SELECTION D'UNE PIECE
function Select_Piece($domicileID, $bdd)
{
    $req = $bdd->prepare('SELECT Nom,ID FROM rooms WHERE Domicile_ID=? ORDER BY Nom');
    $req->execute(array($domicileID));
    echo "
  <select name='IDPieceDel'>";
    while ($donnees = $req->fetch()) {
        echo "  <option value='" . $donnees["ID"] . "'>" . $donnees["Nom"] . "</option>";
    }
    echo "
  </select>";
}

// SELECTION D'UN UTILISATEUR
function Select_User($domicileID, $bdd)
{
    $req = $bdd->prepare('SELECT userID FROM userdomicile WHERE domicileID=?');
    $req->execute(array($domicileID));
    $req2 = $bdd->prepare('SELECT username FROM users WHERE ID=?');

    echo "
  <select name='delUser'>";
    while ($donnees = $req->fetch()) {
        $req2->execute(array($donnees["userID"]));
        $resName = $req2->fetch();

        echo "  <option value='" . $donnees["userID"] . "'>" . $resName[0] . "</option>";
    }
    echo "
  </select>";
}

// LISTE DES PIECES
function listePiece($domicileID, $bdd)
{
    $req = $bdd->prepare('SELECT Nom,ID FROM rooms WHERE Domicile_ID=? ORDER BY ID DESC');
    $req->execute(array($domicileID));
    $k = 1;
    while ($donnees = $req->fetch()) {
        echo "
    <div id='d" . $k . "' class='pieceWrapper'>
    <a href='../Controller/pagePiece.php?id=" . $GLOBALS['domicileSelect'] . "&ip=" . $donnees["ID"] . "'>
    <div class='titre titrePiece'>" . $donnees["Nom"] . "</div>
    </a>
    <div class='pieceContainer'>";
        listeModulesInline($donnees["ID"], $GLOBALS['bdd']);
        echo "</div>
    </div>
    <br/>
    ";
        $k++;
    }
}

function listeModulesInline($pieceID, $bdd)
{
    $req = $bdd->prepare("SELECT Nom, Reference, UUID, Categorie FROM capteurs WHERE ID_piece=? ORDER BY UUID DESC");
    $req->execute(array($pieceID));
    if ($req == false)
        return;
    $data = $req->fetchAll();

    $k = 0;

    foreach ($data as $donnees) {
        $reqImg = $bdd->prepare('SELECT img FROM catalogue WHERE Reference=?');
        $reqImg->execute(array($donnees['Reference']));
        $reqImg = $reqImg->fetch();

        echo "
      <div  id='d" . $k . "' class='modulesWrapper'>
      <img src='" . $reqImg['img'] . "' class='imageModule' style='height:70px;'>
      <p>";
        echo moduleInfo($donnees['UUID'], $donnees['Categorie']);
        echo "</p>
      <figcaption >" . $donnees["Nom"] . "</figcaption>
      </div>
      ";

    }
    $k++;
}

function moduleInfo($id, $categorie)
{
    if ($categorie == "Module") {
        return "Active";
    } elseif ($categorie == "Capteur") {
        return lastMesure($id);
    }
    return "test";
}

function select_Cemac($id_domilice)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare('SELECT id_cemac,nom FROM cemac WHERE id_domicile=?');
    $req->execute(array($id_domilice));
    $data = $req->fetchAll();

    echo "<select name='id_cemac'>";
    foreach ($data as $row) {
        echo "<option value='" . $row["id_cemac"] . "'>" . $row["id_cemac"] . " : " . $row["nom"] . "</option>";
    }
    echo "</select>";
}

function show_Cemac($id_domilice)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare('SELECT id_cemac,nom FROM cemac WHERE id_domicile=?');
    $req->execute(array($id_domilice));
    $data = $req->fetchAll();
    foreach ($data as $row) {
        echo("<tr>");
        echo "<td>" . $row["id_cemac"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo("</tr>");
    }
}


?>
