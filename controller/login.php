<?php

require_once('model/Permission.php');
require_once('model/User.php');

function getPOSTData() {
    $user = new \Ducksper\Oniro\User;
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($user->login($_POST['pseudo'], $_POST['pass'])) {
            header('Location: /');
            exit();
        }
    }
}
getPOSTData();

require_once('view/login.php');