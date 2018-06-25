<html>
<head>
    <link rel="stylesheet" href="/../WatcHouse/Public/Style/faq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<h1>FAQ ADMIN</h1>



<?php
$count = 1;
foreach ($liste_q as $q_r) {
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
        </div>
        <div class="bloc_r" id="r_<?php echo($count); ?>">
            <div class="reponse">
                <form method="post" action="">
                    <h3> Entrer la réponse </h3>
                    <input type="hidden" name="id" value="<?php echo($q_r['id']); ?>"/>
                    <textarea name="reponse" rows="10" cols="50"></textarea>
                    <div>
                        <input type="submit" name="faq" value="Send to FAQ">
                        <input type="submit" name="private" value="Answer privately">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#q_<?php echo($count); ?>").click(onClick<?php echo($count); ?>);
        function onClick<?php echo($count); ?>(){
            $("#r_<?php echo($count); ?>").toggle(500);
        }
    </script>
    <?php
}
if (empty($liste_q)) {
    ?>
    <h2>Pas de nouvelle question</h2>
    <?php
}
?>

<a href="/../WatcHouse/Controller/faq.php" id="image_faq">
    <figure>
        <img src="/../WatcHouse/Public/images/faq_back.png" height="60" alt="test">
        <figcaption>Accéder à la faq</figcaption>
    </figure>
</a>

<script>
    $(".bloc_r").toggle();
</script>

</body>
</html>
