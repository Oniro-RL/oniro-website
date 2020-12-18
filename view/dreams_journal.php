<?php $title = 'Journal de Rêves - Rêves Lucides'; ?>
<?php ob_start(); ?>

<div class="container">

        <div class="first">

            <section class="section section-main">
                <div class="title title-center">
                    <h2>Journal de Rêves</h2>
                </div>
            </section>

            <section class="section section-main">
                <?php if (isset($_GET['erreur']) && $_GET['erreur'] == 'minCarac') { ?>
                    <div class="alert alert-danger">Les champs ne sont pas assez remplies.</div>
                <?php } ?>
                <button class="btn btn-primary btn-block" id="adddream">Ajouter un rêve</button><br />
                <div id='form_adddream'><br />

                    <form action="dreams_journal" method="post" class="form-2">

                    <div class="first-part-form">     
                            <input type="text" class="form-control" name="nom_reve" placeholder="Titre du rêve"><br />

                            <textarea class="form-control" rows="10" name="text_reve" placeholder="Votre rêve..."></textarea><br />
                            <a href="https://risibank.fr/" target="_blank"><img src="https://i.imgur.com/V9OsBLW.png" alt="Risibank"></a>
                    </div>
                    <div class="deux-part-form"> 

                            <label for="methode"><strong>Méthode utilisé:</strong></label>
                            <select class="form-control" id="methode" name="methode_reve">
                                    <?php $db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                    $query = $db->query('SELECT nom, abreviation FROM methodes ORDER BY id');
                                        while ($liste = $query->fetch()) { ?>
                                        <option>
                                        <?php echo $liste['abreviation']; ?>
                                        </option>
                                        <?php } ?>
                                <option selected>Pas de Méthodes</option>
                                <option>Autre</option>
                            </select><br />

                            <strong>Type de Rêve:</strong> <br />
                            
                            <input type="radio" name="type" value="Normale" id="Normale" /><label for="Normale"> Normale</label><br />
                            <input type="radio" name="type" value="Cauchemard" id="Cauchemard" /><label for="Cauchemard"> Cauchemard</label><br />
                            <input type="radio" name="type" value="Récurrent" id="Récurrent" /><label for="Récurrent"> Récurrent</label><br />
                            <input type="radio" name="type" value="Faux-Réveil" id="Faux-Réveil" /><label for="Faux-Réveil"> Faux-Réveil</label><br />

                            <label for="rl"><strong>Rêves Lucides ?</strong></label>
                            <input type="checkbox" name="lucide_reve" id="rl"><br />

                            <label for="date_reve"><strong>Date du Rêve</strong> (laisser vide pour aujourd'hui)</label>
                            <input class="form-control" type="date" id="date_reve" name="date_reve"><br />

                        
                        <!--<button class="btn btn-outline-secondary" id="removedream">Retour</button>--><button type="submit" class="btn btn-primary btn-block">Enregistrer !</button>
                    </div>  

                    </form>
                </div>
            </section>

            <section class="section section-main">

                <?php $db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
            $query = $db->prepare(
                'SELECT id
                FROM membres 
                WHERE pseudo = :username');
            $query->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
            $query->execute();
            $id_user = $query->fetch()['id'];
            
                        
                        /*if ($query->fetch() == 0) { ?>
                        <div style="text-align: center;">
                        <img src="<?php if ($url_param) {echo '../';} ?>public/img/default_index/hero.svg" height="150" alt="hero" />
                        <div class="alert alert-secondary">Il n'y a pas encore de rêves enrengistrés</div>
                        </div>
                        <?php } */
$query = $db->prepare(
                        'SELECT *
                        FROM reves 
                        WHERE id_user = :id_user
                        ORDER BY date DESC');
                        $query->bindValue(':id_user', $id_user, PDO::PARAM_STR);
                        $query->execute();
while ($data = $query->fetch()) { ?>

    <article class="card card-reve" style="border: 5px solid <?= $data['color']; ?>; color: #292b2c; background: white">
        <div class="main">
            <span class="card-title"><?= $data['nom'] ?> 
                <span style="font-size: 0.7em">
                    <?php if (!$data['methode'] == 'Pas de Méthodes') { echo '- ' . $data['methode']; } ?>
                    <?php if ($data['type'] != NULL) { ?>- <?= $data['type']; } ?>
                    <?php if ($data['lucide'] == 1) { ?><span style="text-decoration: underline;">√ Lucide</span><?php } ?>
                </span>
            </span>
            <p class="card-content"><?= nl2br($data['reve']) ?></p>
        </div>

        <div class="card-date">
            <span class="card-date-number"><?= date('d', strtotime($data['date'])); ?></span> <!--<span class="card-date-day"><?= strftime('%A', strtotime($data['date'])); ?></span>-->
        </div>
    </article>
<?php } ?>

            </section>

        </div>
        <div class="deux">
            <?php include 'includes/_profile.php'; ?>
            <?php include 'includes/_liste_methodes.php'; ?>
            <?php include 'includes/_other-pages_jr.php'; ?>
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>