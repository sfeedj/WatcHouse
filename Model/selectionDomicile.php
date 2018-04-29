<?php

/**
 * MVC :
 * - index.php : identifie le routeur à appeler en fonction de l'url
 * - Contrôleur : Crée les variables, élabore leurs contenus, identifie la vue et lui envoie les variables
 * - Modèle : contient les fonctions liées à la BDD et appelées par les contrôleurs
 * - Vue : contient ce qui doit être affiché
 **/


$page = $_GET['page'];
// On identifie le contrôleur à appeler dont le nom est contenu dans cible passé en GET
if(isset($page) && !empty($page)) {

  include('Controller/' . $page . '.php');
  include('Model/'.$page.'php');


} else {
    // Si aucun contrôleur défini en GET, on bascule sur login
    include('Controller/frontLogin.php');
    include('Model/frontLogin.php');

}
?>
