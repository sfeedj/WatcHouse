<html>
<head>
    <link rel="stylesheet" href="/../WatcHouse/Public/Style/faq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<h1>FAQ</h1>


<!--
TODO :
Pour installer le serveur smtp sur wamp (ou autre) :
aller dans php.ini => ligne sendmail_path et remplacer la ligne par :
sendmail_path = C:\wamp\www\WatcHouse\smtp\sendmail.exe
PS : si le projet WatcHouse n'est pas a cet emplacement, modifier l'adresse en consequence.
Compte gmail :
WatchHouse.isep@gmail.com
mdp : WatchHouseIsep*
-->


<?php
$count = 1;
foreach ($liste_q_r as $q_r) {
    $count++;
    ?>
    <div class="bloc_q_r">
        <div class="bloc_q" id="q_<?php echo($count); ?>">
            <h3>Question</h3>
            <div class="question">
                <?php
                echo ($q_r['question']);
                ?>
            </div>
            <?php
            if (!empty($_SESSION['admin'])) {
                ?>
                <a href="/../WatcHouse/Controller/faq_admin.php?delete=<?php echo($q_r['id']); ?>">
                    <img src="/../WatcHouse/Public/Style/faq_delete.png" height="20">
                </a>
                <?php
            }
            ?>
        </div>
        <div class="bloc_r" id="r_<?php echo($count); ?>">
            <h3>Reponse</h3>
            <div class="reponse">
                <?php
                echo ($q_r['reponse']);
                ?>
            </div>
        </div>

    </div>
    <script>
        $("#q_<?php echo($count); ?>").click(onClick<?php echo($count); ?>);
        function onClick<?php echo($count); ?>(){
            $("#r_<?php echo($count); ?>").toggle(300);
        }
    </script>
    <?php
}
?>
<form method="post" action="">
    <label for="Question"> Entrer votre question </label>
    <br>
    <textarea id="Question" name="question" rows="10" cols="50"></textarea>

    <input type="submit" value="Envoyer">
</form>

<?php
if (!empty($_SESSION['admin'])) {
    ?>
    <a href="/../WatcHouse/Controller/faq_admin.php" id="image_faq">
        <figure>
            <img src="/../WatcHouse/Public/images/faq_admin.png" height="60">
            <figcaption>Acceder a la faq admin</figcaption>
        </figure>
    </a>
    <?php
}
?>

<script>
    $(".bloc_r").toggle();
</script>

</body>
</html>
