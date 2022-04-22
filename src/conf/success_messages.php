<?php
class SuccessMessages
{

    // SUCCESS_CONTROLLER_METHOD_ACTION
    const SUCCESS_ADMIN_NEWCATEGORY_EXIST = "a39370bbc545763707ad56257a79853d";
    const SUCCESS_REGISTER_NEWUSER = "b5bbbe4cde14079e56f5d0892c1f0f1e";

    private $_successList = [];

    function __construct() {
        $this->_successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXIST => 'categoria existente',
            SuccessMessages::SUCCESS_REGISTER_NEWUSER => 'usuario registrado'
        ];   
    }

    public function get($hash) {
        return $this->_successList[$hash];
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->_successList);
    }
}
?>