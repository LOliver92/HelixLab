<?php

class Database {
    private $conn;
    
    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'php1905');
    }
    
    function getConn(){
        return $this->conn;
    }
    
    function close(){
        $this->conn = null;
    }
}
?>