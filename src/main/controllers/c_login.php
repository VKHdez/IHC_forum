
<?php

class Login extends Controller  {

    function __construct(){
        
        parent::__construct();
        
        error_log('Login:: created');
    }

    function render(){
        $this->view->render('login');
    }
}
?>