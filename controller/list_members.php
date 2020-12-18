<?php

require_once('model/User.php');

$db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  

$query = $db->query('SELECT * FROM membres ORDER BY id DESC');

function getNumberDreams($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getNumberDreams($username);
}

function getNumberLucidDreams($username) {
    $user = new \Ducksper\Oniro\User;
    return $user->getNumberLucidDreams($username);
}

require_once('view/list_members.php');