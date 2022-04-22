<?php

class ErrorMessages {

    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXIST = "a39370bbc545763707ad56257a79853d";
    
    const ERROR_REGISTER_NEWUSER = "5b5b1d21179e7b52e313228b58d16ae2";
    const ERROR_REGISTER_NEWUSER_EMPTY = "8ab011f57ba534c23c6724d4e12b030f";
    const ERROR_REGISTER_NEWUSER_EXISTS = "5d2973e57651ce6ecfb6c34e10b169a8";
    
    const ERROR_LOGIN_AUTHENTICATE = "29c628e01e9de5d7df60855517c33149";
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "1839d3c8486d13635c7edf4c370d440c";
    const ERROR_LOGIN_AUTHENTICATE_DATA = "f466da26b623692096914bc7fd13a240";

    const ERROR_SEARCH_VERIFY_EMPTY = "72d99a26b623693056914bc7fd13a240";
    

    private $_errorList = [];

    function __construct(){
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXIST => 'categoria existente',
            ErrorMessages::ERROR_REGISTER_NEWUSER => 'hubo un error al intentar registrar el usuario',
            ErrorMessages::ERROR_REGISTER_NEWUSER_EMPTY => 'usuario registrado vacío',
            ErrorMessages::ERROR_REGISTER_NEWUSER_EXISTS => 'el usuario ya existe',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_EMPTY => 'Llena los campos de usuario y Password',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE_DATA => 'Nickname o Password incorrecto',
            ErrorMessages::ERROR_LOGIN_AUTHENTICATE => 'No se puede procesar la solicitud',
            ErrorMessages::ERROR_SEARCH_VERIFY_EMPTY => 'Búsqueda vacía'
        ];    
    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        return array_key_exists($key, $this->errorList);
    }
}
?>