<?php

class Main extends Controller{

    function __construct(){

        parent::__construct();
        
        error_log('Main:: created');
    }

    function render(){
        $this->view->render('main');
    }
}

?>