<link rel="stylesheet" href="../Public/Style/etatCapteurs.css">

<h1>Etat des capteurs</h1>
<div id="tablePosition">
<table class="tableCapteurs">
<thead>
        <tr>
            <th>Capteur</th>
            <th>Type</th>
            <th>Piece</th>
            <th>Domicile</th>
            <th>Reference</th>
            <th>Etat</th>

        </tr>
    </thead>
<?php tableauCapteurs($ID,$bdd); ?>
</table>
</div>