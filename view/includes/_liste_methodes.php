<?php

$db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  

$query = $db->query('SELECT * FROM methodes ORDER BY id');

?>

<section class="section section-main">
	<div class="title title-center">
	<h3 style="margin: 10px">Liste de méthodes</h3></div><hr />
	<div style="overflow: auto;max-height: 200px;max-width: 150px;font-size: 1.1em;text-align: center;margin-left: auto;margin-right: auto;">
		<?php 

		while ($data = $query->fetch()) { ?>
			<div style="font-size: 0.9em;cursor: pointer;" onclick="window.open('methode_desc.php?nom=<?= $data['abreviation']; ?>', 'Méthode: <?= $data['nom']; ?>', 'width=400, height=500')"><strong><?= $data['abreviation']; ?></strong></div>
		<?php } ?>

	</div>
</section>