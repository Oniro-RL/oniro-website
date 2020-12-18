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
                        <h2 style="margin: 10px">Vidéos</h2>
                        <span>Retrouvez ici des vidéos en rapport avec les rêves lucides</span>
                    </div>
                    <br />

<div style="border:5px solid white;padding:5px;margin:10px; margin-right:-15px;margin-left:-15px;background:linear-gradient(#232741, #282341);">
    <center style="display:flex;flex-direction:row;justify-content:space-around;align-items:center">
        <img style="border-radius: 50%;max-width:90px;" src="https://yt3.ggpht.com/a-/AN66SAxsJ1vIokGNUWX24NLAV2ZFlHYbhRUSoIsQPA=s288-mo-c-c0xffffffff-rj-k-no" />
        <span style="color:white;font-size:50px;">Outside The Box</span>
    </center>
</div>

                    <center><iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/eJs8Q_cR2fw" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>

<div style="border:5px solid white;padding:5px;margin:10px; margin-right:-15px;margin-left:-15px;background:linear-gradient(#232741, #282341);">
    <center style="display:flex;flex-direction:row;justify-content:space-around;align-items:center">
        <img style="border-radius: 50%;max-width:90px;" src="https://yt3.ggpht.com/a-/AN66SAzdyn_ZZ2dpMSy0JFurxKzNVLnl96BJ0bDV8g=s288-mo-c-c0xffffffff-rj-k-no" />
        <span style="color:white;font-size:50px;">Autodisciples</span>
    </center>
</div>

                    <center><iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/UalBerazz9c" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                
                <center><iframe width="560" height="315" src="https://www.youtube.com/embed/v30IwrU7BUU" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                
            </section>
        </div>
        <div class="deux">
            <?php include 'includes/_liste_methodes.php'; ?>
            <section class="section section-main">
                <div class="title title-center">
                <h3 style="margin: 10px">Ressources</h3></div><hr />
                <div style="text-align: center;">
                    <li><a href="documents">Documents</li></a>
                    <li>Vidéos</li>
                    <li><a href="#">Audios</a></li>
                    <li><a href="#">Images</a></li>
                </div>
            </section>
            
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>