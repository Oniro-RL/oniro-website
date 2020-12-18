<?php

require_once('model/User.php');

function getInfosUser($type, $pseudo) {
    $user = new \Ducksper\Oniro\User;
    return $user->getInfos($type, $pseudo);
}

require_once('view/about.php');