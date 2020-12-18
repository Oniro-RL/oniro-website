<?php

namespace Ducksper\Oniro;
use \PDO;

class Manager 
{
    protected function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=oniro;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
          catch (Exception $e) {
            die('Error : ' . $e->getMessage());
          }
    }
}

