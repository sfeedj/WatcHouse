<link href="../Public/Style/pageDomicile.css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/scriptFunction.js"></script>
<body onload="changeBackground();">
<br/>
<span id='statut'>Statut : <b><?php echo $statut; ?></b></span>
<span><button id='supprDomicile' href="#" onclick="affichageInvisible('invisibleSuppr')">Supprimer ce domicile</button></span><br/>
<table class='presentation'>
    <colgroup>
        <col span="1" style="width: 40%;">
        <col span="2" style="width: 60%;">
    </colgroup>

    <tr>
        <!-- COLONNE DE GAUCHE -->
        <td class='gauche'>
            <div>
                <!-- widget meteo -->
                <div id="widget_9ae53f3ec3cf40418ae88a63eb3ea58d">
                    <span id="l_9ae53f3ec3cf40418ae88a63eb3ea58d"><a href="http://www.mymeteo.info/r/paris_fe">consultez la m&eacute;t&eacute;o Paris</a></span>
                    <script type="text/javascript">
                        (function () {
                            var my = document.createElement("script");
                            my.type = "text/javascript";
                            my.async = true;
                            my.src = "https://services.my-meteo.com/widget/js?ville=251&format=petit-horizontal&nb_jours=3&c1=393939&c2=a9a9a9&c3=transparent&c4=ffffff&c5=0A7AE9&c6=d21515&police=4&t_icones=3&x=422&y=38&d=0&id=9ae53f3ec3cf40418ae88a63eb3ea58d";
                            var z = document.getElementsByTagName("script")[0];
                            z.parentNode.insertBefore(my, z);
                        })();
                    </script>
                </div>
                <!-- widget meteo -->
            
            <div class="general">
             <span class='titre'>General</span>
    <!--    <td  >
      <img src='../Public/images/Modules/Light.png' class='imageModule' style='height:100px;'>
      <figcaption >Eteindre toutes les lumieres</figcaption>
      <input name="tt" id="tt" class="toggle-status" onclick="geteindreToutLumieres()" type="checkbox"  ' . $checked . '>
    <label for="tt"  class="toggle-switch  toggle-x2 toggle-rounded"></label>
    
      </td>
      <td ></td>-->
      
                </div>

                <table>
                    <colgroup>
                        <col span="1" style="width: 50%;">
                        <col span="2" style="width: 50%;">
                    </colgroup>
                    <tr>
                        <button id='supprUser' href="#" onclick="affichageInvisible('invisibleSupprUser')">Supprimer un
                            utilisateur
                        </button>
                        <button id='addUser' href="#" onclick="affichageInvisible('invisibleADD')">Ajouter un
                            utilisateur
                        </button>
                        <br/>
                    </tr>
                    <div id="chart_div_general"></div>
                </table>

                <div id="liste_cemac">
                    <table class='tableau_clients'>
                        <tr class="enTete">
                            <td>ID_CEMAC</td>
                            <td>Nom CeMac</td>
                        </tr>
                        <?php show_Cemac($GLOBALS["domicileSelect"]) ?>
                    </table>
                </div>
                <div class='gestionCemac'>
                    <div>
                        <button onclick="affichageInvisible('invisible_Cemac')">+</button>
                    </div>
                    <div>
                        <button onclick="affichageInvisible('invisible_Suppr_Cemac')">-</button>
                    </div>
                </div>

            </div>
        </td>
        <!-- COLONNE DE DROITE -->
        <td class='droite'>
            <?php listePiece($GLOBALS['domicileSelect'], $bdd) ?>
        </td>
    </tr>
</table>

<!-- BOUTONS GESTIONS -->
<div class='gestionPieces'>
    <td>
        <button onclick="affichageInvisible('invisible')">+</button>
    </td>
    <td>
        <button onclick="affichageInvisible('invisibleSupprPiece')">-</button>
    </td>
</div>


<!-- FORMULAIRE SUPPRESSION DOMICILE -->
<div class="invisibleSuppr">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisibleSuppr')">
            <span class="titre_form">Supprimer definitivement ce domicile de votre compte ?</span><br/>
            <?php echo "(ID de domicile : " . $GLOBALS['domicileSelect'] . ")"; ?><br/><br/>
            <input id='txt' type="hidden" name="supprDomicile" value="delete"/><br/>
            <label for="checkBox">Cochez cette case pour confirmer : </label>
            <input id="checkBox" name='safety' type="checkbox" required>
            <br/>
            <br/>
            <button type="submit" class="formButton"/>
            Supprimer</button><br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE AJOUT CEMAC -->
<div class="invisible_Cemac">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible_Cemac')">
            <span class="titre_form">Ajouter un CeMac :</span><br/><br/><br/>
            <input name='addCemac' type="hidden" value='add'>
            <input id='txt' type="text" name="idCemac" placeholder=" Id du CeMac" required/><br/>
            <input id='txt' type="text" name="nomCemac" placeholder=" Nom du CeMac" required/><br/>
            <input name='Domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <br/>
            <button type="submit" class="formButton">Ajouter</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE SUPPRESSION CEMAC -->

<div class="invisible_Suppr_Cemac">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton"
                 onclick="affichageInvisible('invisible_Suppr_Cemac')">
            <span class="titre_form">Supprimer un CeMac :</span><br/><br/>
            <input name='delCemac' type="hidden" value='suppr'>
            <input name='id_domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <?php Select_Cemac($GLOBALS['domicileSelect']) ?>
            <br/>
            <br/>
            <button type="submit" class="formButton">Supprimer</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE AJOUT PIECE -->
<div class="invisible">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisible')">
            <span class="titre_form">Ajouter une piece :</span><br/><br/><br/>
            <input name='addRoom' type="hidden" value='add'>
            <input id='txt' type="txt" name="nomPiece" placeholder=" Nom de la piece" required/><br/>
            <input id='txt' type="txt" name="surface" placeholder=" Surface (m²)" required/><br/>
            <input name='Domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <br/>
            <br/>
            <button type="submit" class="formButton">Ajouter</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE SUPPRESSION PIECE -->

<div class="invisibleSupprPiece">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton"
                 onclick="affichageInvisible('invisibleSupprPiece')">
            <span class="titre_form">Supprimer une piece :</span><br/><br/>
            <input name='delRoom' type="hidden" value='suppr'>
            <input name='Domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <?php Select_Piece($GLOBALS['domicileSelect'], $bdd) ?>
            <br/>
            <br/>
            <button type="submit" class="formButton">Supprimer</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE AJOUT UTILISATEUR -->
<div class="invisibleADD">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton" onclick="affichageInvisible('invisibleADD')">
            <span class="titre_form">Ajouter un utilisateur :</span><br/><br/><br/>
            <input id='txt' type="number" name="AddUserID" placeholder="ID de l'utilisateur" required/><br/>
            <input name='Domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <br/>
            <br/>
            <button type="submit" class="formButton">Ajouter</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

<!-- FORMULAIRE SUPPRESSION UTILISATEUR -->
<div class="invisibleSupprUser">
    <div class='formWrapper'>
        <form action="../Controller/pageDomicile.php?id=<?php echo $GLOBALS['domicileSelect']; ?>" method="post"
              class="formulaire">
            <img src='../Public/images/close.png' class="closeButton"
                 onclick="affichageInvisible('invisibleSupprUser')">
            <span class="titre_form">Supprimer un utilisateur :</span><br/><br/>
            <input name='delRoom' type="hidden" value='suppr'>
            <input name='Domicile' type="hidden" value='<?php $GLOBALS['domicileSelect']; ?>'>
            <!-- pour transmettre l'ID domicile -->
            <?php Select_User($GLOBALS['domicileSelect'], $bdd) ?>
            <br/>
            <br/>
            <button type="submit" class="formButton">Supprimer</button>
            <br/><br/>
        </form>
    </div>
    <div class='pageCover'></div>
</div>

</body>
