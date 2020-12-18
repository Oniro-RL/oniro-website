<?php $title = 'Liste des Membres - Rêves Lucides'; ?>
<?php ob_start(); ?>

<div class="container">
            <div class="trois">
                <section class="section section-main">
                    <h2>Liste des membres</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rangs</th>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>Date D'inscription</th>
                                <th>Nombre de rêves</th>
                                <th>Nombre de rêves lucides</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($data = $query->fetch()) { ?>
                            <tr>
                                <th>
                                    <?= $data['id']; ?>
                                </th>
                                <th>
                                    <?php
                                    if ($data['rangs_id'] == 3){
                                    echo '<span class="text-danger">Administrateur</span>';
                                    }
                                    else if ($data['rangs_id'] == 2){
                                    echo '<span class="text-warning">Modérateur</span>';
                                    }
                                    else {echo 'Membre';}
                                ?></th>
                                <th>
                                    <?= $data['pseudo']; ?>
                                </th>
                                <th>
                                    <?= $data['email']; ?>
                                </th>
                                <th>
                                    <?= $data['date_inscription']; ?>
                                </th>
                                <th>
                                    <?= getNumberDreams($data['pseudo']); ?>
                                </th>
                                <th>
                                    <?= getNumberLucidDreams($data['pseudo']); ?>
                                </th>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>