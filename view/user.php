<?php $title = 'Profil - Rêves Lucides'; ?>
<?php $url_param = True; ?>
<?php ob_start(); ?>

<style>
.profile-pseudo {
  color: #333;
  font-size: 26px;
  font-weight: bold;
  text-align: center;
  margin: 6px; 
} .profile-stats {
  display: flex;
  justify-content: space-around;
  text-align: center; }
  .profile-stats .stats {
    display: inline-block;
    margin-top: 4px;
    margin-bottom: 4px; }
    .profile-stats strong {
    display: block;
    color: #B3BaB2;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.2px; }
    .profile-stats span {
    font-size: 26px;
    color: #5E5E5E;
    padding: .18em 0; }
</style>

<div class="container">
    <div class="first">
        <section class="section section-main" style="display:flex;flex-direction:row;">
            <div>
                <img src="<?php //if (isset($url_param)) {echo '../';} ?><?= getInfosUser('avatar', $parameters[0]) ?>" alt="image de profil" style="border-radius:7px;height:250px;width:250px;"/>
            </div>
            <div style="width:100%;text-align: center;margin:20px;align-content:space-around;justify-content:space-around;display:flex;flex-direction:column">
                
                <div style="color: #333;font-size: 60px;font-weight: bold;margin: 6px;">
                    <?= getInfosUser('pseudo', $parameters[0]); ?>
                </div>
                
                    <div class="profile-pseudo" style="font-size: 1.2em;margin: 0;margin-bottom:6px;color: #5E5E5E;"><i><?= getGrade($parameters[0]) ?></i></div>
                        <div class="profile-stats">
                            <div class="stats">
                                <strong>Points</strong>
                                <span><?= getPoints($parameters[0]) ?></span>
                            </div>

                            <div class="stats">
                                <strong>Rêves</strong>
                                <span><?= getNumberDreams($parameters[0]) ?></span>
                            </div>

                            <div class="stats">
                                <strong>Lucides</strong>
                                <span><?= getNumberLucidDreams($parameters[0]) ?></span>
                            </div>
                    </div>
                </div>

                
            
            </section>

            <section class="section section-main">
            <?php $db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
            $query = $db->prepare(
                'SELECT id
                FROM membres 
                WHERE pseudo = :username');
            $query->bindValue(':username', $parameters[0], PDO::PARAM_STR);
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
            <section class="section section-main">
            <?php if (checkRank($parameters[0]) == 3) { ?>
                    <div class="alert alert-info" style="text-align:center">Administrateur</div>
            <?php } elseif (checkRank($parameters[0]) == 2) { ?>
                    <div class="alert alert-info" style="text-align:center">Modérateur</div>
            <?php } ?>
            <h3 style="text-align:center">Informations Additionnels</h3>
                <div style="text-align:center">Membre depuis le <?= getInfosUser('date_inscription', $parameters[0]) ?></div>
                <hr style="width:150px;margin-top:15px;margin-bottom:15px" />
                <div style="margin-left:50px">
                    <div style="display:flex;align-items:center"><img src="<?php if ($url_param) {echo '../';} ?>public/img/icons/twitter.png" alt="logo twitter" height="50" style="margin: 5px"/>
                    @Ducksper</div>
                    <br/>
                    <div style="display:flex;align-items:center"><img src="<?php if ($url_param) {echo '../';} ?>public/img/icons/facebook.png" alt="logo twitter" height="50" style="margin: 5px"/>
                    Ducksper</div>
                    <br/>
                    <div style="display:flex;align-items:center"><img src="<?php if ($url_param) {echo '../';} ?>public/img/icons/instagram.png" alt="logo twitter" height="50" style="margin: 5px"/>
                    Ducksper</div>
                    <br/>
                </div>
            </section>

    </div>

    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>