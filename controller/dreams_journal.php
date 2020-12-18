<?php

require_once('model/User.php');

function getInfosUser($type, $pseudo) {
    $user = new \Ducksper\Oniro\User;
    return $user->getInfos($type, $pseudo);
}

function postDream() {
    $user = new \Ducksper\Oniro\User;
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($user->postDream($_POST['methode_reve'], $_POST['lucide_reve'], $_POST['type'], $_POST['date_reve'], $_POST['nom_reve'], $_POST['text_reve'])) {
            require_once('view/dreams_journal.php');
            exit;
        }
    }
}
postDream();

/*if (isset($_COOKIE['username'])) { //Solution de secours car $parameters[0] inconnue de base, supposé $_SESSION['username']. Voir aussi controller/user
    $parameters[0] = $_COOKIE['username'];
} else if (isset($_SESSION['username'])) {
    $parameters[0] = $_SESSION['username'];
}*/

require_once('view/dreams_journal.php');