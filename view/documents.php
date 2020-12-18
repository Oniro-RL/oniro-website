<?php $title = 'Documents - Rêves Lucides'; ?>
<?php $url_param = True; ?>
<?php ob_start(); ?>

<div class="container">
            <div class="trois">
                <section class="section section-main">
                    <div class="title title-center">
                        <h2 style="margin: 7px">Bibliothèque</h2>
                    </div>
                </section>
            </div>
            <div class="first">
                <!--<section class="section section-main">
                    <div class="title title-center">
                        <h2 style="margin: 10px">Guide</h2>
                        <span>Apprenez et perfectionnez-vous grâce au guide de l'Onyx</span>
                    </div>
                    <br />
                </section>-->
                <section class="section section-main" id="guide_sommaire">
                    <div class="title title-center">
                        <h2 style="margin: 10px">Documents</h2>
                        <span>Retrouvez ici des documents en rapport avec les rêves lucides</span>
                    </div>
                    <br />

                    <div class="card" style="background:#6a5acd">
                    <div class="card-title">On peut contrôler ses rêves (Dossier)</div>
                     Science&Vie 1215 (Décembre 2018)

                     <a href="..\public\bibliotheque\documents\science_et_vie_1215\science_et_vie_1215.pdf"><button style="float:right" class="btn btn-danger">Consulter le document</button></a>
                    </div>

            </section>
        </div>
        <div class="deux">
            <?php include 'includes/_liste_methodes.php'; ?>
            <section class="section section-main">
                <div class="title title-center">
                <h3 style="margin: 10px">Ressources</h3></div><hr />
                <div style="text-align: center;">
                    <li>Documents</li>
                    <li><a href="videos">Vidéos</a></li>
                    <li><a href="#">Audios</a></li>
                    <li><a href="#">Images</a></li>
                </div>
            </section>
            
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>