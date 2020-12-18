<?php

require_once('model/User.php');
require_once('model/Permission.php');

$permission_user = new \Ducksper\Oniro\User;

function checkRank($username) {
    $permission = new \Ducksper\Oniro\Permission;
    return $permission->checkRank($username);
}

function getGrade($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getGrade($username);
}

function getPoints($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getPoints($username);
}

function getNumberDreams($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getNumberDreams($username);
}

function getNumberLucidDreams($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getNumberLucidDreams($username);
}

function getInfosUser($type, $username) { 
    $user = new \Ducksper\Oniro\User;
    return $user->getInfos($type, $username);
}

function getDreams($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getDreams($username);
} /*$query = getDreams($argument);*/

/*if (isset($_COOKIE['username'])) { //Solution de secours car $parameters[0] inconnue de base, supposé $_SESSION['username']
    $parameters[0] = $_COOKIE['username'];
} else if (isset($_SESSION['username'])) {
    $parameters[0] = $_SESSION['username'];
}*/
#->../../parameters[0]/parameters[1]/...

if (isset($parameters[0])) {
    $db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
    $query = $db->prepare('SELECT COUNT(*) > 0 as result FROM membres WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $parameters[0], PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        
        if ($data['result']) {
            require_once('view/user.php');
        } else require_once('view/error.php');
} else require_once('view/error.php');

