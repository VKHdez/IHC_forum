<?php

include dirname(__FILE__)."/../conf/conf.php";
include dirname(__FILE__)."/../conf/route.php";

/**
 * Class App
 * Main Application Class
 */

class App{

    function __construct(){

        settingErrors();

        $url = cleanURL();
        self::loadMain($url);
        // var_dump($url);
    }

    function loadMain($controller){
        
        $mainC = redirectToController($controller);
    }
}
?>