<?php $title = 'Lexique - Rêves Lucides'; ?>
<?php ob_start(); ?>

<div class="container">

<div class="first">

    <section class="section section-main">
        <span style="font-size: 1em;">
        <p>
        <u>Contact :</u> Ducksper (Pseudonyme): <strong>ducksper@gmail.com</strong>
        <br/><br />
        
        
        <u>Dédis à :</u> RVP_VEGETA, Fujiwaring, Pineappleking, mariniere, EDH, pixelraid-, Keyghawa, TeeFreez, Albatar, Olowen, Linkyep, Aigle Perçant, Fjorant, Petit 13, Pikimi, Stowan...<br/><br/>
        
        <u>Contributeur :</u> Onchiste-Fou</p>

        </span>
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