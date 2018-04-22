<link href="../Style/pageDomicile.css" rel="stylesheet">
<script type="text/javascript" src="../js/scriptFunction.js"></script>
<body>
  <br/>
  <span><a href="#" onclick="afficherInvisibleSuppr()">Supprimer ce domicile</a></span><br/>
    <div class="invisibleSuppr" >
      <div class = 'formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect'];?>" method="post" class="formulaire">
          <img src='../View/close.png' class="closeButton" onclick="cacherInvisibleSuppr()">
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
  </html>
