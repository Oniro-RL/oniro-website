<?php

namespace Ducksper\Oniro;
use \PDO;

require_once('model/Manager.php');

class Newsfeed extends Manager {

    public function getAllDreamsAndNews() {
        $db = $this->dbConnect();

        $request = $db->prepare('SELECT * FROM news LEFT JOIN membres ON news.id_auteur = membres.id ORDER BY date DESC');
        $request->execute();
        $news = $request->fetchAll(PDO::FETCH_OBJ); // Voici les news
    
        $request = $db->prepare('SELECT * FROM reves LEFT JOIN membres ON reves.id_user = membres.id ORDER BY date DESC');
        $request->execute();
        $reve = $request->fetchAll(PDO::FETCH_OBJ); // Voici les rêves
    
        $elements = (array) array_merge((array) $news, (array) $reve);
    
        usort($elements, function($a, $b) {
            if ($a->date == $b->date) return 0;
            return ($a->date > $b->date) ? -1 : 1;
        });

        return $elements;
    }

}