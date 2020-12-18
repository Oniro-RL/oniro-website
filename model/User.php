<?php

namespace Ducksper\Oniro;
use \PDO;

require_once('model/Manager.php');

class User extends Manager
{
    public function login($username, $pass)
    {
        $username = htmlspecialchars(stripslashes($username));
        $pass     = htmlspecialchars(stripslashes($pass));
        
        if ((strlen($username) < 3) || (strlen($pass) < 3)) {
            return False;
            exit;
        }
        
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT * FROM membres WHERE pseudo = :username');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        
        if (password_verify($pass, $data['pass'])) {
            $_SESSION['id']     = $data['id'];
            $_SESSION['username'] = $username;
            
            setcookie('id', $data['id'], time() + 365 * 24 * 3600, null, null, false, true);
            setcookie('username', $username, time() + 365 * 24 * 3600, null, null, false, true);
            
            return True;
        } else
            return False;
        
    }
    
    public function signup($username, $email, $pass, $pass2)
    {
        
    }

    public function logout()
    {
        session_destroy();

        if ((isset($_COOKIE['username'])) AND (isset($_COOKIE['id']))) {
            setcookie('username', '', -1);
            setcookie('id', '', -1);
        }

        return True;
    }

    public function postDream($method, $lucid, $type, $date, $nom, $text) 
    {
        $methode_reve = isset($method) ? $method : NULL;
        (int)$lucide_reve = isset($lucid) ? 1 : 0;
        //(int)$theme_reve = isset($_POST['theme_reve']) ? 1 : 0;
        //$classe_reve = isset($_POST['classe_reve']) ? $_POST['classe_reve'] : NULL;
        $type_reve = isset($type) ? $type : NULL;
        $nom_reve = htmlspecialchars(stripslashes($nom));
        $text_reve = htmlspecialchars(stripslashes($text));
        
        if (strlen($date) < 3) {
            $date_reve = date('Y-m-d H:i:s');
        } else {
            $date_reve = $date;
        }
        
        
        
         //On vérifie si les champs sont remplis
         if (isset($nom_reve) && isset($text_reve)) {
            if ((strlen($nom_reve) < 3) OR (strlen($text_reve) < 3) ) {
                return False;
                exit;
            }
         } else { return False; exit; }
        
        
        $id_user = $_SESSION['id'];
        
        // On insére le rêve dans la base de données
        $db = $this->dbConnect();

            $insert = $db->prepare('INSERT INTO reves(id_user, nom, lucide, methode, date, reve, color, type)
              VALUES(:id_user, :nom, :lucide, :methode, :date, :reve, :color, :type)');
            $insert->execute(array(
                'id_user' => (int)$id_user,
                'nom' => $nom_reve,
                'lucide' => (int)$lucide_reve,
                'methode' => $methode_reve,
                'date' => $date_reve,
                'reve' => $text_reve,
                'color' => $this->randomColor(),
                'type' => $type_reve
            ));
        
            return True;
    }

    public function randomColor() 
    {
        $color = ['#99CC00', '#FFBB33', '#33B5E5', '#AA66CC', '#CC0000', '#ff4444', '#0099cc', '#9933cc', '#669900', '#ff8800', '#cc0000', '#888888'];
        return $color[array_rand($color, 1)];
    }
    
    public function getInfos($type, $pseudo)
    {
        $db = $this->dbConnect();
        
        $query = $db->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        if ($type == 'pseudo') {
            return $data['pseudo'];
        }
        
        elseif ($type == 'date_inscription') {
            $data['date_inscription'] = date_create($data['date_inscription']);
            return date_format($data['date_inscription'], 'd/m/Y');
        } elseif ($type == 'avatar') {
            if ($data['avatar'] == 'noavatar') {
                return 'https://api.adorable.io/avatars/285/' . $data['pseudo'] . '.png';
            } else {
                return 'public/img/avatars/' . $data['avatar'];
            }
        } elseif ($type == 'prive') {
            return $data['prive'];
        } elseif ($type == 'nbReves') {
            $query = $db->prepare('SELECT COUNT(id_user) AS nbReves FROM reves INNER JOIN membres ON membres.id = reves.id_user WHERE pseudo = :pseudo');
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch();
            if ($data['nbReves'] <= 0) {
                $data['nbReves'] = 0;
            }
            return $data['nbReves'];
        } elseif ($type == 'nbRevesLucides') {
            $query = $db->prepare('SELECT SUM(lucide) AS nbLucide FROM membres INNER JOIN reves ON membres.id = reves.id_user WHERE pseudo = :pseudo');
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch();
            if ($data['nbLucide'] <= 0) {
                $data['nbLucide'] = 0;
            }
            return $data['nbLucide'];
        }
        return $data['nbLucide'];
    }

    public function getPoints($username) 
    {
        return ($this->getNumberDreams($username) + $this->getNumberLucidDreams($username)) * 3;
    }

    public function getNumberLucidDreams($username)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT SUM(lucide) AS nbLucide FROM membres INNER JOIN reves ON membres.id = reves.id_user WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$username, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        if ($data['nbLucide'] <= 0) {
          $data['nbLucide'] = 0;
        }

        return $data['nbLucide'];
    }

    public function getNumberDreams($username) 
    {

        $db = $this->dbConnect();
        $query = $db->prepare('SELECT COUNT(id_user) AS nbReves FROM reves INNER JOIN membres ON membres.id = reves.id_user WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$username, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        if ($data['nbReves'] <= 0) {
            $data['nbReves'] = 0;
        }

        return $data['nbReves'];
    }
    
    public function getGrade($username)
    {
        $exp = $this->getPoints($username) / 3;
        if ($exp == 0) {
            $grade = "Néant Onirique";
            return $grade;
        }
        if ($exp <= 5) {
            $grade = "Débutant Onirique";
            return $grade;
        }
        
        if ($exp <= 15) {
            $grade = "Projecteur Onirique";
            return $grade;
        }
        
        if ($exp <= 30) {
            $grade = "Onironaute";
            return $grade;
        }
        
        else if ($exp <= 60) {
            $grade = "Onironaute Confirmé";
            return $grade;
        }
        
        else if ($exp <= 100) {
            $grade = "Explorateur Onirique";
            return $grade;
        }
        
        else if ($exp <= 140) {
            $grade = "Aventurier Onirique";
            return $grade;
        }
        
        else if ($exp <= 170) {
            $grade = "Scientifique Onirique";
            return $grade;
        }
        
        else if ($exp <= 200) {
            $grade = "Grand Dirigeant Onirique";
            return $grade;
        }
        
        else if (($exp <= 300) OR ($exp >= 300)) {
            $grade = "Titan Onirique";
            return $grade;
        }
    }

    public function getDreams($username) 
    {
        $db = $this->dbConnect();

        //get id user
        $query = $db->prepare(
            'SELECT id
            FROM membres 
            WHERE pseudo = :username');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->execute();
        $id_user = $query->fetch()['id'];

        //get dreams with id user
        $query = $db->prepare(
            "SELECT *
            FROM reves 
            WHERE id_user = :id_user
            ORDER BY date DESC");
        $query->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $query->execute();
        
        return $query;
        /*$dreams = $query->fetch();
        
        return $dreams;*/
    }
    
}