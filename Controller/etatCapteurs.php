<?php

include($_SERVER['DOCUMENT_ROOT'].'/Watchouse/Model/domicileFunctions.php');


function iconEtat($icon,$bdd) {
  if ($icon=="1" ){
    return "<img class='okIcons' src='../Public/images/icons/1.png' alt='ok'>";
  }
  else 
    return "<img class='okIcons'src='../Public/images/icons/0.png' alt='notOk'>";
  
}


function tableauCapteurs($bdd)
{
  $req = $bdd->query(
       ' SELECT capteurs.Nom AS capteurNom,
        capteurs.Type AS capteurType,
        rooms.Nom AS pieceNom,
        domiciles.Nom AS domicileNom,
        capteurs.Référence AS capteurRef,
        capteurs.Etat AS capteurEtat
        FROM capteurs 
        JOIN rooms 
        ON rooms.ID = capteurs.ID_pièce 
        JOIN domiciles 
        ON domiciles.ID= rooms.Domicile_ID WHERE ID_propriétaire="1" ');


  while ($donnees = $req->fetch()){
    echo "
    <tr>
        <th>".$donnees["capteurNom"]."</th>
        <td>".$donnees["capteurType"]."</td>
        <td>".$donnees["pieceNom"]."</td>
        <td>".$donnees["domicileNom"]."</td>
        <td>".$donnees["capteurRef"]."</td>
        <td>".iconEtat($donnees["capteurEtat"],$bdd)."</td>
    </tr>
    " ;

    }
  }


if (isset($_SESSION['ID'])){ 
  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/header.php');
  include($_SERVER['DOCUMENT_ROOT'].'/WatcHouse/View/etatCapteurs.php');
  include("../View/footer.php");
  
 
}



?>