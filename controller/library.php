<?php

require_once('model/User.php');

if (isset($parameters[0])) {

    if ($parameters[0] == 'videos') {
        require_once('view/videos.php');
    } 

    elseif ($parameters[0] == 'documents') {
        require_once('view/documents.php');
    } 

    else echo('Erreur paramètre - controller/library.php 10');
} 

else {
    require_once('view/library.php');
}

