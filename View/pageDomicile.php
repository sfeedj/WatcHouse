<link href="../Style/pageDomicile.css" rel="stylesheet">
<script type="text/javascript" src="../js/scriptFunction.js"></script>
<body onload="changeBackground();">
  <br/>
  <span><button id='supprDomicile' href="#" onclick="affichageInvisible('invisibleSuppr')">Supprimer ce domicile</button></span><br/>

  <table class='présentation'>
    <colgroup>
      <col span="1" style="width: 40%;">
      <col span="2" style="width: 60%;">
   </colgroup>

    <tr>
       <!-- COLONNE DE GAUCHE -->
      <td class='gauche'>
        <div>
          <!-- widget meteo -->
          <div id="widget_e967f5004672a06ac3a435bf2cd241e7">
          <span id="l_e967f5004672a06ac3a435bf2cd241e7"><a href="http://www.mymeteo.info/r/paris_fe"></a></span>
          <script type="text/javascript">
          (function() {
          	var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
             	my.src = "https://services.my-meteo.com/widget/js?ville=251&format=petit-horizontal&nb_jours=3&c1=393939&c2=a9a9a9&c3=transparent&c4=ecf0f1&c5=3498db&c6=d21515&police=4&t_icones=3&x=422&y=38&d=0&id=e967f5004672a06ac3a435bf2cd241e7";
             	var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
          })();
          </script>
          </div>
          <!-- widget meteo -->
        <div class="général">
          <span class='titre'>GÉNÉRAL</span>
        </div>
      </td>
    </div>

<!-- COLONNE DE DROITE -->
      <td class='droite'>
          <?php listePiece($GLOBALS['domicileSelect'],$bdd) ?>
      </td>


    </tr>
  </table>

<!-- BOUTONS GESTIONS -->
  <div class='gestionPieces'>
    <td><button href="#" onclick="affichageInvisible('invisible')">+</button></td>
    <td><button href="#" onclick="affichageInvisible('invisibleSupprPiece')">-</button></td>
  </div>


<!-- FORMULAIRE SUPPRESSION DOMICILE -->
  <div class="invisibleSuppr" >
    <div class = 'formWrapper'>
      <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect'];?>" method="post" class="formulaire">
        <img src='../View/close.png' class="closeButton" onclick="affichageInvisible('invisibleSuppr')">
        <span class="titre_form">Supprimer définitivement ce domicile de votre compte ?</span><br/>
        <?php echo "(ID de domicile : ".$GLOBALS['domicileSelect'].")"; ?><br/><br/>
        <input id='txt' type="hidden" name="supprDomicile"  value="delete" /><br/>
        <label for="checkBox">Cochez cette case pour confirmer : </label>
        <input id="checkBox" name='safety' type="checkbox" required>
        <br/>
        <br/>
        <button type="submit" class="formButton" />Supprimer</button><br/><br/>
      </form>
    </div>
    <div class ='pageCover'></div>
  </div>
</body>

<!-- FORMULAIRE AJOUT PIECE -->
<div class="invisible" >
  <div class = 'formWrapper'>
    <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect'];?>"method="post" class="formulaire">
      <img src='../View/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
      <span class="titre_form">Ajouter une pièce :</span><br/><br/>
      <input  name='addRoom' type="hidden" value='add'>
      <input id='txt' type="txt" name="nomPiece" placeholder=" Nom de la pièce" required /><br/>
      <input  name='Domicile' type="hidden" value='<?php  $GLOBALS['domicileSelect'];?>'> <!-- pour transmettre l'ID domicile -->
      <br/>
      <br/>
      <button type="submit" class="formButton">Ajouter</button><br/><br/>
    </form>
  </div>
  <div class ='pageCover'></div>
</div>

<!-- FORMULAIRE SUPPRESSION PIECE -->

<div class="invisibleSupprPiece" >
  <div class = 'formWrapper'>
    <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect'];?>"method="post" class="formulaire">
      <img src='../View/close.png' class="closeButton" onclick="affichageInvisible('invisibleSupprPiece')">
      <span class="titre_form">Supprimer une pièce :</span><br/><br/>
      <input  name='delRoom' type="hidden" value='suppr'>
      <input  name='Domicile' type="hidden" value='<?php  $GLOBALS['domicileSelect'];?>'> <!-- pour transmettre l'ID domicile -->
      <?php Select_Piece($GLOBALS['domicileSelect'],$bdd) ?>
      <br/>
      <br/>
      <button type="submit" class="formButton">Supprimer</button><br/><br/>
    </form>
  </div>
  <div class ='pageCover'></div>
</div>

</body>
