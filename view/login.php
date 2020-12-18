<?php $title = 'Connexion - Rêves Lucides'; ?>
<?php ob_start(); ?>

<div class="container"><?php if (isset($_GET['error'])) { ?>
            <div class="first">
            <section class="section section-main">
                                    <?php
                    switch ($_GET['error']) {
                    case 'diffPass':
                    ?>
                    <div class="alert alert-danger">Les deux mots de passes sont différents.</div>
                    <?php
                    break;
                    case 'minCarac':
                    ?>
                    <div class="alert alert-danger">Le pseudo ou l'email sont trop court.</div>
                    <?php
                    break;
                    case 'minCaracPass':
                    ?>
                    <div class="alert alert-danger">Le mot de passe est trop court.</div>
                    <?php
                    break;
                    case 'memePseudo':
                    ?>
                    <div class="alert alert-danger">Le pseudo est déjà pris.</div>
                    <?php
                    break;
                    case 'memeEmail':
                    ?>
                    <div class="alert alert-danger">L'email est déjà pris.</div>
                    <?php
                    break;
                    case 'badInfo':
                    ?>
                    <div class="alert alert-danger">Les informations ne sont pas bonnes.</div>
                    <?php
                    break;                      
                    }
                     ?>
            </section></div> <?php } ?>
            <div class="first">
                <section class="section section-main connexion">
                    <div class="connexion-connexion">
                        <h2>Connexion</h2>
                        <form action="login" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass" placeholder="Mot de Passe">
                            </div>
                            <button class="btn btn-primary">Se Connecter !</button>
                        </form>
                    </div>
                    <div class="connexion-inscription">
                        <h2>Inscription</h2>
                        <form action="login" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pseudo_i" placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email_i" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Mot de Passe">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordbis" placeholder="Mot de Passe Bis">
                            </div>
                            <button class="btn btn-primary">S'Inscrire !</button>
                        </form>
                    </div>
                </section>
            </div>
            
    <!--<img src="ressources/img/discordapp.png" alt="discordapp" class="event-img" onclick="discordAlert()" />-->
    <?php include 'includes/_other-pages_index.php' ?>
 
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>