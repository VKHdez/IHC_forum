<?php
    //.. config file

    define('URL','http://localhost:80/PROJECTS/foro_web');
    define('HOST','localhost');
    define('DB','ihc_forum');
    define('USER','root');
    define('PASSWORD','root');
    define('CHARSET','utf8mb4');

    function settingErrors(){

        $errorPath = $_SERVER['DOCUMENT_ROOT'].'/PROJECTS/foro_web/src/libs/docs/logs/php-project.log';
        
        error_reporting(E_ALL);
        ini_set('ignore_repeated_errors', TRUE);
        ini_set('dispplay_errors',FALSE);
        ini_set('log_errors',TRUE);
        ini_set('error_log',$errorPath);
    
        error_log('-- Initialized error configuration');
    }
    
    function cleanURL(){
        $url = $_GET['url'];

        $url = rtrim($url, '/');
        $url = explode('/', $url);

        return $url;
    }
?>