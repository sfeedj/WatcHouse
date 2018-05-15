<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>WatcHouse</title>
  <link rel="stylesheet" href="/../WatcHouse/Public/Style/pagePiece.css">
  <script type="text/javascript" src="../Public/js/scriptFunction.js"></script>
</head>

  <body>

    <div class = 'entete'>
    <h1><?php echo nomDomicile($GLOBALS['pieceSelect'],$bdd); ?></h1>
  </div>
  <div class="selectModule"><?php listeModules($GLOBALS['pieceSelect'],$bdd); ?></div>
  <div class='gestionModules'>
    <button href="#" onclick="affichageInvisible('invisible')" id='left'>+</button>
    <button href="#" onclick="affichageInvisible('invisibleSuppr')">-</button>
  </div>


    <!-- FORMULAIRE AJOUT MODULE -->
    <div class="invisible" >
      <div class = 'formWrapper'>
        <form action="../Controller/pagePiece.php?id=<?php echo $GLOBALS['domicileSelect'];?>&ip=<?php echo $GLOBALS['pieceSelect'];?>"method="post" class="formulaire">
          <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
          <span class="titre_form">Ajouter un module :</span><br/><br/><br/>
          <div><?php Select_Module($bdd); ?><br/><br/>
          <input id='txt' type="txt" name="nomModule" placeholder=" Nom du module" required /><br/></div>
          <input  name='Piece' type="hidden" value='<?php  $GLOBALS['pieceSelect'];?>'> <!-- pour transmettre l'ID piece -->
          <br/>
          <br/>
          <button type="submit" class="formButton">Ajouter</button><br/><br/>
        </form>
      </div>
      <div class ='pageCover'></div>
    </div>

    <!-- FORMULAIRE SUPPRESSION MODULE -->

    <div class="invisibleSuppr" >
      <div class = 'formWrapper'>
        <form action="../Controller/pagePiece.php?id=<?php echo $GLOBALS['domicileSelect'];?>&ip=<?php echo $GLOBALS['pieceSelect'];?>"method="post" class="formulaire">
          <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisibleSuppr')">
          <span class="titre_form">Supprimer un module :</span><br/><br/><br/><br/>
          <input  name='delRoom' type="hidden" value='suppr'/>
          <input  name='Piece' type="hidden" value='<?php  $GLOBALS['domicileSelect'];?>'/> <!-- pour transmettre l'ID domicile -->
          <?php Select_Module_Suppr($bdd) ?>
          <br/>
          <br/><br/><br/><br/><br/>
          <button type="submit" class="formButton">Supprimer</button><br/><br/>
        </form>
      </div>
      <div class ='pageCover'></div>
    </div>


  </body>
  </html>
