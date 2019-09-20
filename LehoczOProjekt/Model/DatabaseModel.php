<?php

class Database {
     private $conn;
    
    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'bikejournal');
    }
    
    public function getConn(){
        return $this->conn;
    }
    
    public function close(){
        mysqli_close($this->conn);
        $this->conn = null;
    }
    
    public function safeText($str) {
        return trim(strip_tags(mysqli_real_escape_string($this->conn, $str)));
    }
}
