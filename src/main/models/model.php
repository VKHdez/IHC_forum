<?php

/**
 * Model Class
 */

class Model{

    // Construct function
    function __construct(){
        $this->db = new Database();
    }

    // Query function
    function query($query){
        return  $this->db->connect()->query($query);
    }

    // Prepare Function
    function prepare($query){
        return  $this->db->connect()->prepare($query);
    }
}
?>