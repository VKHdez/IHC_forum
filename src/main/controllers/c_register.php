
<?php

class Register extends Controller  {

    function __construct(){
        
        parent::__construct();
        
        error_log('Registration:: created');
    }

    function render(){
        $this->view->render('register');
    }
}
?>