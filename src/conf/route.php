<?php
    // .. ROUTING file

    function verifyURL(){

    }

    function redirectToController($url){

        $controller = null;

        if ( empty($url[0]) ){
            $controllerLogin = 'src/main/controllers/c_login.php';

            if( file_exists($controllerLogin) ){
                require_once $controllerLogin;
                $controller = new Login();
            }
        }

        return $controller;
    }
    
?>