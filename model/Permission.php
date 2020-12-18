<?php

namespace Ducksper\Oniro;
use \PDO;

require_once('model/Manager.php');

class Permission extends Manager
{
    public function checkConnection() {
        $db = $this->dbConnect();

        if (isset($_COOKIE['id']) && (isset($_SESSION['username']))) {
            $_SESSION['id'] = $_COOKIE['id'];
            $_SESSION['username'] = $_COOKIE['username'];
        }

        if (isset($_SESSION['id']) && (isset($_SESSION['username']))) {
            $query = $db->prepare('SELECT pseudo FROM membres WHERE id = :id');
            $query->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetch();

            if ($data['pseudo'] == $_SESSION['username']) {
                return True;
            }
        } else return False;
    }

    public function checkRank($username) 
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT rangs_id FROM membres WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $username, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        
        if ($data['rangs_id'] == 3) {
            return 3;
        } elseif ($data['rangs_id'] == 2) { 
            return 2;
        } elseif ($data['rangs_id'] == 0) { 
            return 0;
        } else {
            return false;
        }
    }
}