<?php

/**
 * Controller Class
 */
class Controller {

    function __construct(){
        $this->view = new View();
    }

    /**
     * loadModel() - load model from models/ folder
     * @param $model - Model to be loaded
     * @return void
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

    function existPOST($params)
    {
        $exist = false;
        
        foreach ($params as $param) {

            if (!isset($_POST[$param])) {
                error_log('Controller:: existPOST -> No existe el parámetro: '.$param);
                $exist = false;
            }
        }
        $exist = true;

        return $exist;
    }

    function existGET($params)
    {
        $exist = false;

        foreach ($params as $param) {
            if (!isset($GET[$param])) {
                error_log('Controller:: existGET -> No existe el parámetro');
                $exist = false;
            }
        }
        $exist = true;

        return $exist;
    }

    function getGET($name)
    {
        return $_GET[$name];
    }

    
    function getPOST($name)
    {
        return $_POST[$name];
    }

    function redirect($route, $mensajes)
    {
        $data = [];
        $params = '';

        foreach ($mensajes as $key=>$mensaje) {
            $array = array_push($data, $key.'='.$mensaje);
        }

        $params = join('&', $data);

        if ($params != '') {
            $params = '?' . $params;
        }

        header('Location: '. constant('URL') .'/'. $route . $params);
    }
}
?>