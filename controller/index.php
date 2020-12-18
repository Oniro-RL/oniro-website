<?php

require_once('model/Permission.php');
require_once('model/Newsfeed.php');
require_once('model/User.php');

$permission_user = new \Ducksper\Oniro\Permission;
$newsfeed = new \Ducksper\Oniro\Newsfeed;

function getInfosUser($type, $pseudo) {
    $user = new \Ducksper\Oniro\User;
    return $user->getInfos($type, $pseudo);
}

$elements = $newsfeed->getAllDreamsAndNews();

if ($permission_user->checkConnection()) {
    require_once('view/index.php');
} else require_once('view/default_index.php');
