<?php

require '../conf/conf.php';

class App{

    function __construct(){
        echo "<h1>Foro Web Universitario App</h1>";

        $url = cleanURL();
        loadController($url);
    }

    function loadController(controller){
        // .. TODO: loadController
    }
}
?>