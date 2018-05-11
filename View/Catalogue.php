<link href="../Public/Style/Catalogue.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>

<body>
  <br/>
  <div class=commande>
    <?php Select_Commande($bdd) ?>
  </div>
    <div class="tableauWrapper">
      <table class='tableau_modules'>
        <?php Liste_Modules($bdd) ?>
      </table>
    </div>
</body>
</html>
