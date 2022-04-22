<?php
class IHCError extends Controller{
    function __construct(){
        parent::__construct();

        error_log('Errores:: -> inicio de Errores');
    }

    function render(){
        $this->view->render('error');
    }
}
?>