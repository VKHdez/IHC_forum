<?php
    //.. config file

    function cleanURL(){
        $url = $_GET['url'];

        $url = rtrim($url, '/');
        $url = explode('/', $url);

        return $url;
    }
?>