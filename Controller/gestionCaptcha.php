<?php
mt_srand((float) microtime()*1000000);
//affiche 1 nombre aléatoire entre 1000 et 10 000
//augmentez si vous voulez 6 chiffres  10 000  et 100 000  etc....
$captcha=mt_rand(1000, 10000);
echo ($captcha);