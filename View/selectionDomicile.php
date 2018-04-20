<link href="../Style/selectionDomicile.css" rel="stylesheet">
<script type="text/javascript" src="../js/scriptFunctions.js"></script>
<body>
  <br/>
  <div class="tableauWrapper">
    <table class='tableau_domiciles'>
      <?php Tableau_Domiciles($bdd) ?>
      <td class="CaseDomicile"><a href="#" onclick="afficherInvisible()"><img src='../View/add.png' class=addButton><figcaption>Ajouter un Domicile</figcaption></a></td>
    </table>
  </div>
  <div class="invisible" >
    <div class = 'formWrapper'>
      <form action="../Controller/selectionDomicile.php" method="post" class="formulaire">
        <img src='../View/close.png' class="closeButton" onclick="cacherInvisible()">
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
</html>
