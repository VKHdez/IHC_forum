<?php

/**
 * Controller Class
 */
class Controller{

    function __construct(){
        $this->view = new View();
    }

    /**
     * loadModel() - load model from models/ folder
     * @param $model - Model to be loaded
     */
    function loadModel( $model ){
        $url = 'src/main/models/'. $model . 'model.php';

        if( file_exists($url) ){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }else{
            error_log('Model does not exists...');
        }
    }
}
?>