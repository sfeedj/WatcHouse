<link rel="stylesheet" href="../Public/Style/etatCapteurs.css">


<div id="tablePosition">
<table class="tableCapteurs">
<thead>
        <tr>
            <th>Capteur</th>
            <th>Type</th>
            <th>Piece</th>
            <th>Domicile</th>
            <th>Référence</th>
            <th>Etat</th>

        </tr>
    </thead>
<?php tableauCapteurs($bdd); ?>
</table>
</div>