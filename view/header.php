<?php

require_once('model/Permission.php');

$instancePermission = new \Ducksper\Oniro\Permission();

$check_connection_user = $instancePermission->checkConnection();
if (isset($_SESSION['username'])) {
	$check_rank_user = $instancePermission->checkRank($_SESSION['username']);
}

?>

<header>
	<nav class="navbar" <?php if (isset($check_rank_user) && $check_rank_user == 2) { ?> style="border-bottom: 4px solid #ffbb33" <?php } ?>>
	    <div class="left">
	        <a href="<?php if (isset($url_param)) {echo '..';} ?>/"><?= $text['navbar_home'] ?></a>
			<a href="<?php if (isset($url_param)) {echo '..';} ?>/library">Bibliothèque</a>
			<!--<a href="<?php if (isset($url_param)) {echo '..';} ?>/lexique">Lexique</a>-->

			<?php if ($check_connection_user) { ?>
			<a href="<?php if (isset($url_param)) {echo '..';} ?>/dreams_journal"><?= $text['navbar_dreams_journal'] ?></a>
			<?php } ?>

	    </div>

		<div class="right">
		<?php if ($check_connection_user) { ?>
	        <a href="<?php if (isset($url_param)) {echo '..';} ?>/user/<?= $_SESSION['username'] ?>"><?= $text['navbar_profile'] ?></a>
			<a href="<?php if (isset($url_param)) {echo '..';} ?>/logout"><?= $text['navbar_log_out'] ?></a>
		<?php } else { ?>
	        <a href="<?php if (isset($url_param)) {echo '..';} ?>/login"><?= $text['login'] ?></a>
			<a href="<?php if (isset($url_param)) {echo '..';} ?>/login"><?= $text['sign_up'] ?></a>
		<?php } ?>		
	    </div>
	</nav>
	<!--<img src="public/img/logo/logo_alternatif_2_bordure.svg" alt="logo" class="nav-logo" />-->

	<script type="text/javascript">
		var refresh = false;

		var bouton = document.getElementById('adminActivate');
		var divAPrendre = document.getElementById('adminDropdown');

			divAPrendre.style.visibility = 'hidden';
			divAPrendre.style.position = 'absolute';
  
		bouton.addEventListener('click', function () {
			if (!refresh) {
				divAPrendre.style.visibility = 'visible';
				divAPrendre.style.position = 'initial';
				refresh = true;
			} else {
				divAPrendre.style.visibility = 'hidden';
				divAPrendre.style.position = 'absolute';
				refresh = false;					
			}
		});
	</script>

</header>