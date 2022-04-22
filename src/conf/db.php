<?php
class Database
{

    private $_host = '';
    private $_db = '';
    private $_user = '';
    private $_password = '';
    private $_charset = '';

    public function __construct()
    {
        $this->_host = constant('HOST');
        $this->_db   = constant('DB');
        $this->_user = constant('USER');
        $this->_password = constant('PASSWORD');
        $this->_charset  = constant('CHARSET');
    }

    function connect()
    {
        try {
            $connection = "mysql:host=" . $this->_host . ";dbname=" . $this->_db . ";charset=" . $this->_charset;

            $options = [
                PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($connection, $this->_user, $this->_password, $options);
            return $pdo;
        } catch(PDOException $e) {
            error_log('DATABASE:: Connection Error -> ' . $e->getMessage());
        }
    }
}
?>