<?php
    // .. ROUTING file

    include dirname(__FILE__)."/../main/controllers/error.php";

    function verifyURL(){

    }

    function redirectToController($url){

        $fileController = null;
        $controller = null;

        // Loads Main Controller by default
        if ( empty($url[0]) ){
            $fileController = 'src/main/controllers/c_main.php';

            require_once $fileController;
            $controller = new Main();

            $controller->loadModel('main');
            $controller->render();
            
            return;
        }

        /**
         * Load controller specified within URL
         */
        $fileController = 'src/main/controllers/c_'.$url[0].'.php';

        if (file_exists($fileController)){ // Checks if FILE PATH Exists, thus, controller exist
            require_once $fileController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);


            if( !isset($url[1])){ // Checks if method is defined in URL
                
                $controller->render(); // NOT: Loads default Method
            }else{

                if( !method_exists($controller, $url[1]) ){ // Check if Method EXIST whithin the Controller
                    //$controller = new IHCError();        // Throws 404 Error
                    error_log('Acceso a método 1 no definido');
                }else{

                    if(!isset($url[2])){ // LOAD first method
                        $controller->{$url[1]}();
                    }else{
                        
                        $nparam = count($url) -2; // Params
                        $params = [];

                        for($i = 0; $i<$nparam; $i++){
                            array_push($params, $url[$i]+2);
                        }

                        $controller->{$url[2]}($params);
                    }
                }
            }

        }else{
            $controller = new IHCError();
            error_log('Acceso a Controlador no definido = '.$url[0]);
        }
    }
    
?>