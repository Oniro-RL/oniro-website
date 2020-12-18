<?php

namespace Ducksper\Oniro;

class Translation 
{
    public function getJSONFile() {
        $language_user = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        if ($language_user == 'fr_FR') {
            $language_user = 'fr';
        }
        $url = 'public/translation_' . $language_user . '.json';
        $data = file_get_contents($url);
        $text = json_decode($data, true);
        return $text;
    }
}