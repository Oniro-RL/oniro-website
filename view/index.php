<?php $title = $text['catchphrase_1']; ?>
<?php ob_start(); ?>

<div class="container">
            <div class="first">
                <?php /*if (isset($_GET['success']) && ($_GET['success'] == 'inscription')) {*/ ?>
                <style>@font-face {
                font-family: 'space font';
                src: url('ressources/fonts/space font.ttf');
                }</style>
                <section class="section section-main" style="display: flex;flex-direction: row;align-items: center;justify-content: space-evenly">
                    <div>
                        <h2>Bienvenue sur <span style="font-family: 'space font'; font-size: 1.5em;margin: 0">Oniro</span></h2>
                        <h3>Vous pouvez :</h3>
                        <ul>
                            <li>- Accèder à votre <a href="dreams_journal">Journal de Rêves,</a></li>
                            <li>- Lire <a href="library">le guide,</a></li>
                            <li>- Discuter sur <a href="https://discord.gg/jRaEYQP">le chat,</a></li>
                            <li>- Lire votre fil d'actualité <img src="http://freevector.co/wp-content/uploads/2014/01/14732-bottom-right-arrow1.png" alt="flèche de gauche en bas" height="15px"></li>
                        </ul>
                    </div>
                    <img src="public/img/default_index/ship.svg" alt="vaisseau spacial" height="250px" />
                </section>
                <?php  ?>
                <section class="section section-main">
                    
                    <?php 
                    foreach ($elements as $elm) { 
                        if (isset($elm->news_verif)) { ?>
                <article class="card card-changelog" style="border: 5px solid #B3BaB2; color: #292b2c; background: white;">
                    <center><img alt="Update" class="card-changelog-img" src="<?= $elm->image ?>" style="width:100%"></center>
                    <div class="main">
                        <span class="card-title"><?= $elm->nom ?></span>
                        <p class="card-content"><?= nl2br($elm->texte) ?></p>
                    </div>
                </article>
                <?php } else { if (!$elm->prive || !$elm->id_user == $_SESSION['id']) { ?>
                <article class="card card-reve" style="border: 5px solid <?= $elm->color ?>; color: #292b2c; background: white;">
                    <div class="main">
                        <span class="card-title">
                            
                            <img src="<?= getInfosUser('avatar', $elm->pseudo); ?>" alt="avatar" style="border-radius:50%;float: left;" width='50'/>
                            <span style="font-size: 0.7em"><span style="font-size: 1.4em;"><?= $elm->nom ?></span><br /><span style="font-size: 0.9em;text-align: right;"><i><?php if ($elm->id_user == $_SESSION['id']) { echo 'Depuis votre journal de rêves';} else { echo 'De ' . $elm->pseudo; } ?></i></span>
                            <?php if ($elm->methode == 'Pas de Méthodes') {} else { echo '- ' . $elm->methode; } ?>
                            <?php if ($elm->type != NULL) { ?>- <?= $elm->type; } ?>
                            <?php if ($elm->lucide == 1) { ?><span style="text-decoration: underline;">√ Lucide</span><?php } ?>
                        </span><br />
                    </span>
                    
                    <p class="card-content">
                        <?= nl2br($elm->reve) ?>
                    </p>
                    
                </div>
                <div class="card-date">
                    <span class="card-date-number"><?= date('d', strtotime($elm->date)); ?></span> <!--<span class="card-date-day"><?= strftime('%A', strtotime($elm->date)); ?></span>-->
                </div>
            </article>
            <?php } } ?>
        <?php } /*?><pre><?php print_r($elements); ?></pre><?php */?>
        <div class="alert alert-info">Fil d'actualité en cours de finition</div>
    </section>
</div>
<div class="deux">
    <?php include 'includes/_profile.php'; ?>
    <?php include 'includes/_other-pages_index.php'; ?>
    <?php include 'includes/_other-propos_index.php'; ?>
</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>