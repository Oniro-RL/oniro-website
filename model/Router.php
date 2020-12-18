<?php

namespace Ducksper\Oniro;

require_once('model/Translation.php');
use \Ducksper\Oniro\Translation;

class Router
{
    public function toController($url_send, $controller) 
    {
        if ($url_send && $controller) {
            //découpe l'url entre les / (compris)
            $explode_url_delimiter = preg_split("/(\/)/", $_SERVER['REQUEST_URI'], -1, PREG_SPLIT_DELIM_CAPTURE);
            
            //Translation//
            $translation = new \Ducksper\Oniro\Translation;
            $text = $translation->getJSONFile();
            ///////////////
            
                $parameters = array();
                for ($i = 0; $i < count($this->urlToArguments($url_send)); $i++) {
                    array_push($parameters, $this->urlToArguments($url_send)[$i]);
                }

                /*$url_send = substr($_SERVER['REQUEST_URI'], 0, -strlen($argument));
                $url_send = trim($url_send, '/');*/

        if ($explode_url_delimiter[2] == $url_send) {
                require_once 'controller/' . $controller;exit;
            } elseif (strlen($explode_url_delimiter[2]) < 1) {
                require_once 'controller/index.php';exit;
            }
        }
    }
    

    public function urlToArguments($url_send)
    {
        $explode_url = preg_split("/(\/)/", $_SERVER['REQUEST_URI']);
        $arguments = array();
        for ($i = 0; $i < count($explode_url) ; $i++) { 
            if ((strlen($explode_url[$i]) > 1) && !($explode_url[$i] == $explode_url[1])) {
                $arguments[] = $explode_url[$i];
            } 
        } return $arguments;
    }
}

