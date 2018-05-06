<html>
<head>
    <link rel="stylesheet" href="/../APPwebsite2/Style/faq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<div id="title">
    <h1>FAQ ADMIN</h1>
    <a href="/../APPwebsite2/Controller/faq.php">
        <img src="/../APPwebsite2/Style/faq_back.png" height="60">
    </a>
</div>



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
            $("#r_<?php echo($count); ?>").toggle(300);
        }
    </script>
    <?php
}
?>
<script>
    $(".bloc_r").toggle();
</script>

</body>
</html>