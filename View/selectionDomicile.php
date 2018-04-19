<link href="../Style/selectionDomiciles.css" rel="stylesheet">
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
      <form action="/../APPwebsite2/Controller/selectionDomicile.php" method="post" class="formulaire">
        <img src='../View/close.png' class="closeButton" onclick="cacherInvisible()">
        <span class="titreForm">Ajouter un domicile :</span><br/>
        <input type="txt" name="nom" placeholder=" Nom du Domicile" required /><br/>
        <input type="txt" name="adresse" placeholder=" Adresse" required />
        <br/>
        <br/>
        <button type="submit" class="formButton" />Connexion</button><br/><br/>
      </form>
    </div>
    <div class ='pageCover'></div>
  </div>
</body>
</html>
