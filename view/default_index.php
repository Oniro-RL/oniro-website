<?php $title = $text['catchphrase_1']; ?>
<?php ob_start(); ?>

	<body>
		<!--<div id="particles-js" style="width: 100%;height: 99%;position: absolute;top: 0;left: 0"></div>-->
		<style type="text/css">
			@font-face {
				font-family: 'space font';
				src: url('public/fonts/space font.ttf');
			}
			.boite {
				display: flex;
				flex-direction: row;
				justify-content: space-evenly;
				align-items: center;
			}
		</style>
		<div class="container">
			
			<div class="trois">
				<section class="section section-main boite">
					<img src="public/img/default_index/drapeau.svg" alt="Drapeau avec astronaute" height="270px">
					<div style="display: flex;align-items: center;flex-direction: column">
						<h1 style="font-family: 'space font'; font-size: 7em;margin: 0">Onyx<span style="font-size:0.2em">v.dev</span></h1>
						<div><a href="login"><button class="btn btn-outline-secondary btn-lg"><?= $text['login'] ?></button></a>
						<a href="login"><button class="btn btn-primary btn-lg"><?= $text['sign_up'] ?></button></div></a>
					</div>
				</section>
			</div>
				<div class="first">
					<section class="section section-main boite">
						<h2 style="text-align: center;">Sommaire</h2><span style="font-size: 1.3em">
						<a href="library">Bibliothèque</a><br />
						<a href="library">Ressources</a><br />
					</section>
				</div>
				<div class="deux">
					<div class="section section-main">
<iframe src="https://discordapp.com/widget?id=376777553945296896&theme=dark" width="280" height="350" allowtransparency="true" frameborder="0"></iframe>
					</div>
				</div>
			</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>