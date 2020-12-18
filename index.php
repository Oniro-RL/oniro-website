<?php 

session_start();

require_once('model/Router.php');
require_once('model/Permission.php');

$router = new \Ducksper\Oniro\Router;
$permission_user = new \Ducksper\Oniro\Permission;

$router->toController('/', 'index.php');
$router->toController('index.php', 'index.php');
$router->toController('index', 'index.php');
$router->toController('accueil', 'index.php');
$router->toController('home', 'index.php');
$router->toController('42', 'index.php');

$router->toController('about', 'about.php');
$router->toController('library', 'library.php');

$router->toController('error', 'error.php');

if (!$permission_user->checkConnection()) {
    $router->toController('login', 'login.php');
} 

if ($permission_user->checkConnection()) {
    $router->toController('user', 'user.php');
    $router->toController('logout', 'logout.php');
    $router->toController('dreams_journal', 'dreams_journal.php');
    
    if ($permission_user->checkRank($_SESSION['username']) >= 2) {
        $router->toController('list_members', 'list_members.php');
        if ($permission_user->checkRank($_SESSION['username']) == 3) {
        }
    }
}

header('Location: /');