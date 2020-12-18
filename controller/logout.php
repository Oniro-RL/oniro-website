<?php

require_once('model/User.php');

$user = new \Ducksper\Oniro\User;

$user->logout();
header('Location: ../');
exit();


