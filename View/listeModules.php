<link href="../Public/Style/listeModules.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>
<script src="../Public/dist/dropzone.js"></script>


<body>
  <br/>

  <div>
    <div class="tableauWrapper">
      <table class="gestion">
        <tr class="optionGestion">
          <td><button href="#" onclick="affichageInvisible('invisible')">+</a></td>
          <td><button href="#" onclick="affichageInvisible('invisibleSuppr')">-</a></td>
        </tr>
      </table>
      <table class='tableau_modules'>
        <tr class="enTete"><td>Nom</td><td>Prix (€)</td><td>Description</td><td>Référence</td></tr>
        <?php Liste_Modules($bdd) ?>
      </table>
    </div>
  </div>

  <div class="invisible" >
    <div class = 'formWrapperADD'>
      <form action="../Controller/listeModules.php" method="post" class="formulaire">
        <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
        <span class="titre_form">Ajouter un Module :</span><br/><br/>
        <input id='txt' type="txt" name="nomModule" placeholder=" Nom " required /><br/>
        <input id='txt' type="number" name="Prix" placeholder=" Prix" required /><br/>
        <input id='txt' type="txt" name="Description" placeholder=" Description" required /><br/>
        <input id='txt' type="txt" name="img" placeholder="../images/monImage.png" /><br/>
        <br/>
        <button type="submit" class="formButton" />Ajouter</button><br/><br/>
      </form>
    </div>
    <div class ='pageCover'></div>
  </div>

  <div class="invisibleSuppr" >
    <div class = 'formWrapperSUPPR'>
        <?php Select_Module($bdd); ?>
    </div>
    <div class ='pageCover'></div>
  </div>


</body>
</html>
