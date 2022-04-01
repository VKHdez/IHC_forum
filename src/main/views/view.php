<?php

class View{
    
    function __construct(){

    }

    function render( $nombre, $data = []){
        $this->d = $data;

        require 'src/main/views/'. $nombre .'.php';
    }

}
?>