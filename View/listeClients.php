<link href="../Style/listeClients.css" rel="stylesheet">
<script type="text/javascript" src="../js/scriptFunction.js"></script>
<body>
  <br/>
  <div class="tableauWrapper">
    <table class="gestion">
      <tr class="optionGestion ">
        <td><a href="#" onclick="afficherInvisible()">Ajouter un client</a></td>
        <td><a href="#" onclick="afficherInvisibleSuppr()">Supprimer un client</a></td>
      </tr>
      </table>
      <table class='tableau_clients'>
        <tr class="enTete"><td>ID</td><td>Username</td><td>Date d'ajout</td></tr>
        <?php Liste_Clients($bdd) ?>
      </table>
    </div>
    <div class="invisible" >
      <div class = 'formWrapper'>
        <form action="../Controller/listeClients.php" method="post" class="formulaire">
          <img src='../View/close.png' class="closeButton" onclick="cacherInvisible()">
          <span class="titre_form">Ajouter un client :</span><br/><br/>
          <input id='txt' type="txt" name="nomClient" placeholder=" Nom du Client" required /><br/>
          <input id='txt' type="email" name="email" placeholder=" Adresse Mail" required /><br/>
          <label for="checkBox">Compte Administrateur</label>
          <input  name='admin' type="hidden" value=0> <!-- pour transmettre 0 par défaut -->
          <input id="checkBox" name='admin' type="checkbox" value=1>
          <br/>
          <br/>
          <button type="submit" class="formButton" />Ajouter</button><br/><br/>
        </form>
      </div>
      <div class ='pageCover'></div>
    </div>

    <div class="invisibleSuppr" >
      <div class = 'formWrapper'>
        <form action="../Controller/listeClients.php" method="post" class="formulaire">
          <img src='../View/close.png' class="closeButton" onclick="cacherInvisibleSuppr()">
          <span class="titre_form">Supprimer un client :</span><br/><br/>
          <input id='txt' type="txt" name="nomClient" placeholder=" Nom du Client" required /><br/>
          <input id='txt' type="txt" name="IDClient" placeholder=" ID du client" required /><br/>
          <label for="checkBox">Cochez cette case pour supprimer l'utilisateur : </label>
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
