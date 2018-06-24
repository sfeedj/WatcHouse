<?php

session_start();
include_once('bddConnect.php');

function ajouterDomcile($nom, $numero, $adresse, $codepostal, $ville, $pays, $proprietaire, $bdd)
{
    $liste = '';
    $req = $bdd->prepare("INSERT INTO domiciles ( Nom, Numero, Adresse, CodePostal, Ville, Pays, Proprietaire, Pieces) VALUES ( :Nom, :Numero, :Adresse, :CodePostal, :Ville, :Pays, :Proprietaire, :Pieces)");
    $req->execute(array(
        'Nom' => $nom,
        'Numero' => $numero,
        'Adresse' => $adresse,
        'CodePostal' => $codepostal,
        'Ville' => $ville,
        'Pays' => $pays,
        'Proprietaire' => $proprietaire,
        'Pieces' => $liste,
    ));
}

function ajoutUser($userID, $domicileID, $bdd)
{
    $req = $bdd->prepare("INSERT INTO userdomicile (userID, domicileID) VALUES ( :userID, :domicileID)");
    $req2 = $bdd->prepare("SELECT 1 FROM userdomicile WHERE userID=? AND domicileID=?");
    $req2->execute(array($userID, $domicileID));
    $res2 = $req2->fetch();

    if ($res2[1] == "") {
        $req->execute(array(
            'userID' => $userID,
            'domicileID' => $domicileID
        ));
    }
}

function supprUser($user, $domicile, $bdd)
{
    $req = $bdd->prepare("DELETE FROM userdomicile WHERE userID=? AND domicileID=?");
    $req->execute(array($user, $domicile));
}

function checkProprietaire($userID, $domicileID, $bdd)
{
    $req2 = $bdd->prepare("SELECT 1 FROM domiciles WHERE Proprietaire=? AND ID=?");
    $req2->execute(array($userID, $domicileID));
    $res2 = $req2->fetchAll();
    if (!isset($res2[0])) {
        // echo 'false';
        return false;
    }
    // echo 'true';
    return true;
}

function supprimerDomicile($ID, $bdd)
{
    $req = $bdd->prepare("DELETE FROM domiciles WHERE ID=?");
    $req->execute(array($ID));
    $req = $bdd->prepare("DELETE FROM pieces WHERE Domicile_ID=:ID");
    $req->execute(array(
        'ID' => $ID
    ));
}

function supprimerDomicileInvite($userID, $domicileID, $bdd)
{
    $req = $bdd->prepare("DELETE FROM userdomicile WHERE userID=? AND domicileID=?");
    $req->execute(array($userID, $domicileID));
}

function commanderArticle($nomModule, $userID, $bdd)
{
    $req = $bdd->prepare("INSERT INTO commandes (user_ID, article_commande) VALUES (:userID,:article)");
    $req->execute(array(
        'userID' => $userID,
        'article' => $nomModule
    ));
}

function ajouterPiece($nomPiece, $surface, $domicile, $proprietaire, $bdd)
{
    $req = $bdd->prepare("INSERT INTO rooms (Domicile_ID,Proprietaire,Nom, Surface) VALUES ( :Domicile, :Proprietaire, :Nom, :Surface)");
    $req->execute(array(
        'Domicile' => $domicile,
        'Proprietaire' => $proprietaire,
        'Nom' => $nomPiece,
        'Surface' => $surface
    ));
}

function supprimerPiece($IDPiece, $domicile, $proprietaire, $bdd)
{
    $req = $bdd->prepare("DELETE FROM rooms WHERE ID=? AND Proprietaire=?");
    $req->execute(array($IDPiece, $proprietaire));
}


function nomDomicile($domicileID, $bdd)
{
    $req = $bdd->prepare("SELECT Nom FROM rooms WHERE ID=?");
    $req->execute(array($domicileID));
    $res = $req->fetch();
    return $res['Nom'];
}

function surfaceDomicile($domicileID, $bdd)
{
    $req = $bdd->prepare("SELECT Surface FROM rooms WHERE ID=?");
    $req->execute(array($domicileID));
    $res = $req->fetch();
    return $res['Surface'];
}


function ajouterModule($id_cemac, $id_type, $numero, $nom, $id_piece)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("INSERT INTO capteurs (id_cemac ,id_type , numero, nom, id_piece) VALUES ( :id_cemac, :id_type, :numero, :nom, :id_piece)");
    $req->execute(array(
        'id_cemac' => $id_cemac,
        'id_type' => $id_type,
        'numero' => $numero,
        'nom' => $nom,
        'id_piece' => $id_piece
    ));
}

function supprimerModule($id)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("DELETE FROM capteurs WHERE id=?");
    $req->execute(array($id));
}

function lastMesure($id_cemac, $type_capteur, $numero_capteur)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("SELECT data FROM mesures WHERE id_cemac=? and id_type=? and numero_capteur=? ORDER BY AddedOnDate DESC LIMIT 1");
    $req->execute(array($id_cemac, $type_capteur, $numero_capteur));
    $res = $req->fetch();
    if (isset($res['data'])) {
        return $res['data'];
    } else
        return "N/A";
}

//Fonctions Relative a la page de profil

function chargerInfosProfile($bdd, $username)
{
    $req = $bdd->query('SELECT * FROM users WHERE username="' . $username . '"');
    while ($donnees = $req->fetch()) {
        $_SESSION['ID'] = $donnees['ID'];
        $_SESSION['username'] = $donnees['username'];
        $_SESSION['Nom'] = $donnees['Nom'];
        $_SESSION['password'] = $donnees['password'];
        $_SESSION['Prenom'] = $donnees['Prenom'];
        $_SESSION['Date_de_naissance'] = $donnees['Date_de_naissance'];
        $_SESSION['Mail'] = $donnees['Mail'];
        $_SESSION['Telephone'] = $donnees['Telephone'];
        $_SESSION['Adresse'] = $donnees['adresse'];
    }
}


function changePassword($bdd, $username)
{
    if (isset($_POST['oldPassword1']) && isset($_POST['oldPassword2']) && isset($_POST['newPassword']) && $_POST['oldPassword1'] == $_POST['oldPassword2'] && $_POST['oldPassword1'] != $_POST['newPassword']) {
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        $bdd->exec(" UPDATE users SET password='$newPassword'  WHERE username='$username' ");
    }
}

function changeNom($bdd, $username)
{
    if (isset($_POST['Nom']) && $_POST['Nom'] != $_SESSION['Nom']) {
        $Nom = $_POST['Nom'];
        $_SESSION['Nom'] = $Nom;
        $bdd->exec(" UPDATE users SET Nom='$Nom' WHERE username='$username' ");
    }
}

function changeDate($bdd, $username)
{
    if (isset($_POST['Date_de_naissance']) && $_POST['Date_de_naissance'] != $_SESSION['Date_de_naissance']) {
        $Date = date('j-F-Y', strtotime($_POST['Date_de_naissance']));
        $_SESSION['Date_de_naissance'] = $Date;
        $bdd->exec(" UPDATE users SET Date_de_naissance='$Date' WHERE username='$username' ");
    }
}

function changeAdresse($bdd, $username)
{
    if (isset($_POST['Adresse']) && $_POST['Adresse'] != $_SESSION['Adresse']) {
        $Adresse = $_POST['Adresse'];
        $_SESSION['Adresse'] = $Adresse;
        $bdd->exec(" UPDATE users SET Adresse='$Adresse' WHERE username='$username' ");
    }
}

function changeMail($bdd, $username)
{
    if (isset($_POST['Mail'])) {
        $Mail = $_POST['Mail'];
        $_SESSION['Mail'] = $Mail;
        $bdd->exec(" UPDATE users SET Mail='$Mail' WHERE username='$username' ");
    }
}

function changePrenom($bdd, $username)
{
    if (isset($_POST['Prenom'])) {
        $newPrenom = $_POST['Prenom'];
        $_SESSION['Prenom'] = $newPrenom;
        $bdd->exec(" UPDATE users SET Prenom='$newPrenom' WHERE username='$username' ");

    }
}

function changePhone($bdd, $username)
{
    if (isset($_POST['Prenom'])) {
        $newPhone = $_POST['Telephone'];
        $_SESSION['Telephone'] = $newPhone;
        $bdd->exec(" UPDATE users SET Telephone='$newPhone' WHERE username='$username' ");

    }
}

function ajouterPhoto($userphoto, $username, $bdd)
{
    $req = $bdd->exec("UPDATE users SET image='$userphoto' WHERE username='$username' ");

}

function urlImage($username, $bdd)
{
    $req = $bdd->query("SELECT image FROM users WHERE username='$username' ");
    while ($donnees = $req->fetch()) {
        $urlPhoto = $donnees['image'];
        if ($urlPhoto != "") {
            return "<img src='" . $urlPhoto . "' alt='photo'/>";
        } else {
            return "<img src='../Public/images/userPhoto.png' alt='photo-profil'/>";
        }
    }
    return null;
}

function ajouterCemac($id_cemac, $nom_cemac, $id_domicile)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("INSERT INTO cemac(id_cemac, id_domicile, nom) VALUES(:id_cemac, :id_domicile, :nom)");
    $req->execute(array("id_cemac" => $id_cemac, "id_domicile" => $id_domicile, "nom" => $nom_cemac));
}

function supprimerCemac($id_cemac, $id_domicile)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("DELETE FROM cemac WHERE id_cemac=:id_cemac AND id_domicile=:id_domicile");
    $req->execute(array("id_cemac" => $id_cemac, "id_domicile" => $id_domicile));
}

function listeCemac($id_domicile)
{
    $bdd = $GLOBALS['bdd'];
    $req = $bdd->prepare("SELECT * FROM cemac WHERE id_domicile=:id_domicile");
    $req->execute(array("id_domicile" => $id_domicile));
    return $req->fetchAll();
}


?>
