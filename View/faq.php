
<html>
<head>
    <link rel="stylesheet" href="/../APPwebsite2/Style/faq.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    <?php
    $liste_q_r = [
            ['question' => 'salut, ça va ?', 'reponse' => 'salut, oui ça va !'],
            ['question' => "Comment tu t'appelles ?", 'reponse' => 'Jean Michel !']
        ];
    ?>
    <h1>FAQ</h1>



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
                $("#r_<?php echo($count); ?>").toggle(1000);
            }
        </script>
        <?php
    }
    ?>
    <form method="post" action="">
        <label for="Question"> Entrer votre question </label>
        <br>
        <textarea id="Question" name="Question" rows="10" cols="50"></textarea>

        <input type="submit" value="Envoyer">
    </form>
    <script>
        $(".bloc_r").toggle();
    </script>

</body>
</html>
