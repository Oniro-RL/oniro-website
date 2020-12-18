<?php
require_once('model/User.php');

$permission_user = new \Ducksper\Oniro\User;

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
?>

<div class="section section-profile" style="background:white">
    <img src="<?= getInfosUser('avatar', $_SESSION['username']) ?>" alt="Avatar" class="profile-avatar" />
    <div class="profile-pseudo" style="margin-bottom: 0;"><?= getInfosUser('pseudo', $_SESSION['username']); ?></div>
<div class="profile-pseudo" style="font-size: 0.9em;margin: 0;margin-bottom:6px;color: #5E5E5E;"><i><?= getGrade($_SESSION['username']) ?></i></div>
    <div class="profile-stats">
        <div class="stats">
            <strong>Points</strong>
            <span><?= getPoints($_SESSION['username']) ?></span>
        </div>

        <div class="stats">
            <strong>Rêves</strong>
            <span><?= getNumberDreams($_SESSION['username']) ?></span>
        </div>

        <div class="stats">
            <strong>Lucides</strong>
            <span><?= getNumberLucidDreams($_SESSION['username']) ?></span>
        </div>
    </div>
</div>
