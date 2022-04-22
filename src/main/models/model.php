<?php

include_once 'src/libs/imodel.php';

/**
 * Model Class
 */
class Model
{

    // Construct function
    function __construct()
    {
        $this->db = new Database();
        error_log('MODEL:: Model Database created');
    }

    // Query function
    function query($query)
    {
        return  $this->db->connect()->query($query);
    }

    // Prepare Function
    function prepare($query)
    {
        return  $this->db->connect()->prepare($query);
    }
}
?>