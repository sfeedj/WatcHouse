<link href="../Public/Style/selectionDomiciles.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>
<body>
  <br/>
  
  <div class="tableauWrapper">
    <table class='tableau_domiciles'>
      <?php Tableau_Domiciles($bdd) ?>
      <td class="CaseDomicile"><a href="#" onclick="affichageInvisible('invisible')"><img src='../Public/images/add.png' class=addButton><figcaption>Ajouter un Domicile</figcaption></a></td>
    </table>
  </div>

  <!-- FORMULAIRE AJOUT DOMICILE -->
  <div class="invisible" >
    <div class = 'formWrapper'>
      <form action="../Controller/selectionDomicile.php" method="post" class="formulaire">
        <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
        <span class="titre_form">Ajouter un domicile :</span><br/><br/>
        <input type="txt" name="nomDomicile" placeholder=" Nom du Domicile" required /><br/>
        <input type="txt" name="adresseDomicile" placeholder=" Adresse" required />
        <br/>
        <br/>
        <button type="submit" class="formButton" />Ajouter</button><br/><br/>
      </form>
    </div>
    <div class ='pageCover'></div>
  </div>
</body>
