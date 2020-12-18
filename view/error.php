<?php $title = 'A Propos - Rêves Lucides'; ?>
<?php ob_start(); ?>

<div class="container">

<div class="first">

    <section class="section section-main">
        <h2>Une erreur s'est produite.</h2>
        Retourner en page d'accueil <a href="<?php if (isset($url_param)) {echo '..';} ?>/"><?= $text['navbar_home'] ?></a>
    </section>

</div>
<div class="deux">

    <?php //include 'includes/_profile.php'; ?>
    <?php //include 'includes/_other-pages_index.php'; ?>
    <?php include 'includes/_other-propos_index.php'; ?>

</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>