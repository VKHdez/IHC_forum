<?php

include dirname(__FILE__)."/../conf/conf.php";
include dirname(__FILE__)."/../conf/route.php";

class App{

    function __construct(){

        settingErrors();

        $url = cleanURL();
        //$url = "ABC";
        self::loadMain($url);
    }

    function loadMain($controller){
        // .. TODO: loadController
        $mainC = redirectToController($controller);
        $mainC->loadModel('login');        
        $mainC->render();
    }
}
?>