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
    
    public static function safeText ($str, $conn){
        $a = trim($str);
        $b = strip_tags($a);
        $c = mysqli_real_escape_string($conn, $b);
        return $c;
    }
}
