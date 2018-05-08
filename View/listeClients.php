<link href="../Public/Style/listeClients.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>

<body>
  <br/>
  <!-- Tab links -->
  <div class="tab">
    <button class="tablinks"  onclick="openTab(event, 'tabClients')" >Liste des clients</button>
    <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'tabRecherche')">Recherche</button>
  </div>

  <!-- Tab content -->
  <div id="tabClients" class="tabcontent">
    <div class="tableauWrapper">
      <table class="gestion">
        <tr class="optionGestion ">
          <td><button href="#" onclick="affichageInvisible('invisible')">+</button></td>
          <td><button href="#" onclick="affichageInvisible('invisibleSuppr')">-</button></td>
        </tr>
      </table>
      <table class='tableau_clients'>
        <tr class="enTete"><td>ID</td><td>Username</td><td>Statut</td><td>Date d'ajout</td></tr>
        <?php Liste_Clients($bdd) ?>
      </table>
    </div>
  </div>

  <div id="tabRecherche" class="tabcontent">
    <br/>
    <div class="recherche">
      <table>
        <tr>
          <form action="../Controller/listeClients.php" method="get" class='searchForm'>
            <input id="rechercheBarre" type="text" placeholder="Rechercher un identifiant..." name="recherche">
            <button type='submit' class="searchButton">🡒</button><br/><br/>
          </form>
        </tr>
        <tr id='searchResult'>
          <table >
            <colgroup>
              <col span="1" style="width: 50%;">
              <col span="2" style="width: 50%;">
           </colgroup>
           <tr>
          <?php if(isset($_GET['recherche'])){rechercheClient($_GET['recherche'],$bdd);}  ?>
        </tr>
          </tr>
        </table>
      </div>
    </div>


    <div class="invisible" >
      <div class = 'formWrapper'>
        <form action="../Controller/listeClients.php" method="post" class="formulaire">
          <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
          <span class="titre_form">Ajouter un client :</span><br/><br/>
          <input id='txt' type="txt" name="nomClient" placeholder=" Nom du Client" required /><br/>
          <input id='txt' type="email" name="email" placeholder=" Adresse Mail" required /><br/>
          <label for="checkBox">Compte Administrateur</label>
          <input  name='admin' type="hidden" value=0> <!-- pour transmettre 0 par défaut -->
          <input id="checkBox" name='admin' type="checkbox" value=1>
          <br/>
          <br/>
          <button type="submit" class="formButton">Ajouter</button><br/><br/>
        </form>
      </div>
      <div class ='pageCover'></div>
    </div>

    <div class="invisibleSuppr" >
      <div class = 'formWrapper'>
        <form action="../Controller/listeClients.php" method="post" class="formulaire">
          <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisibleSuppr')">
          <span class="titre_form">Supprimer un client :</span><br/><br/>
          <input id='txt' type="txt" name="nomClient" placeholder=" Nom du Client" required /><br/>
          <input id='txt' type="txt" name="IDClient" placeholder=" ID du client" required /><br/>
          <label for="checkBox2">Cochez cette case pour supprimer l'utilisateur : </label>
          <input id="checkBox2" name='safety' type="checkbox" required>
          <br/>
          <br/>
          <button type="submit" class="formButton" />Supprimer</button><br/><br/>
        </form>
      </div>
      <div class ='pageCover'></div>
    </div>

    <div class="invisibleMail" >
      <div class = 'popupMail'>
        <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisibleMail')">
        <br/><br/><br/><br/><br/>
          <span class="titre_form">Cette adresse mail est déjà utilisée !</span>
      </div>
      <div class ='pageCover'></div>
    </div>

    <script>
    document.getElementById("defaultOpen").click();
    </script>


  </body>
  </html>
