<?php $title = 'Bibliothèque - Rêves Lucides'; ?>
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
                    <?php if (isset($_GET['s']) && ($_GET['s'] == 'yes')) { /*postGuideFinish($_GET['c']);*/ ?>
                    <center><div class="alert alert-success">Wow ! Vous avez terminé un chapitre, au suivant !</div></center>
                    <?php } ?>
                    <div class="title title-center">
                        <h2 style="margin: 10px">Guide</h2>
                        <span>Apprenez et perfectionnez-vous grâce à ce guide</span>
                    </div>
                    <br /><hr />
                    <div class="title title-center">
                        <h3>Débutant</h3>
                    </div>
                    <div class="guide guide-bubble-div-one">
                        <div class="guide-bubble">
                            <div><a href="#introduction" id="introduction_request"><img src='public/img/icons/moon.svg' alt='icone' class="icon" />
                                <!--<img src="ressources/img/icons/check.svg" alt="check" class="completed" />--></div>
                                
                                <div>Introduction</div>
                            </a>
                        </div>
                    </div>
                    <div class="guide guide-bubble-div-various">
                        <div class="guide-bubble">
                            <div><a href="#"><img src='public/img/icons/book.svg' alt='icone' class="icon" style="filter: grayscale(75%);"/><!--<img src="ressources/img/icons/check.svg" alt="check" class="completed" />--></div></a>
                            <a href="#">
                                <div>Journal de Rêves</div>
                            </a>
                        </div>
                        <div class="guide-bubble">
                            <div><a href="#"><img src='public/img/icons/activity.svg' alt='icone' class="icon" style="filter: grayscale(75%);" /></div></a>
                            <a href="#">
                                <div>Tests de Réalités</div>
                            </a>
                        </div>
                    </div>
                    <div class="guide guide-bubble-div-various">
                        <div class="guide-bubble">
                            <div><a href="#wild" id="wild_request"><img src='public/img/icons/align-center.svg' alt='icone' class="icon"/></div></a>
                            <a href="#">
                                <div>WILD</div>
                            </a>
                        </div>
                        <div class="guide-bubble">
                            <div><a href="#"><img src='public/img/icons/align-center.svg' alt='icone' class="icon"  style="filter: grayscale(75%);"/></div></a>
                            <a href="#">
                                <div>MILD</div>
                            </a>
                        </div>
                        <div class="guide-bubble">
                            <div><a href="#"><img src='public/img/icons/align-center.svg' alt='icone' class="icon"  style="filter: grayscale(75%);"/></div></a>
                            <a href="#">
                                <div>WBTB</div>
                            </a>
                        </div>
                    </div>

                    <div class="title title-center">
                        <h3>Annexes</h3>
                    </div>

                    <div class="guide-bubble">
                        <div><a href="#applications_mobiles_request" id="applications_mobiles_request"><img src='public/img/icons/smartphone.svg' alt='icone' class="icon"/></div></a>
                        <a href="#">
                            <div>Applications Mobiles</div>
                        </a>
                    </div>
            </section>
            <section class="section section-main" id="guide_content" style="font-size: 0.9em">
                <div class="title title-center">
                    <h2 style="margin: 10px">Guide</h2>
                </div><hr />
                <span id="guide_txt"></span>
                <center style="margin-top: 20px">
                <a href="library"><button class="btn btn-primary">Sommaire</button></a>
                <a href="library"><button class="btn btn-primary">Chapitre Terminé !</button></a>
                </center>
            </section>
        </div>
        <div class="deux">
            <?php include 'includes/_liste_methodes.php'; ?>
            <section class="section section-main">
                <div class="title title-center">
                <h3 style="margin: 10px">Ressources</h3></div><hr />
                <div style="text-align: center;">
                    <li><a href="library/documents">Documents</a></li>
                    <li><a href="library/videos">Vidéos</a></li>
                    <li><a href="#">Audios</a></li>
                    <li><a href="#">Images</a></li>
                </div>
            </section>
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>