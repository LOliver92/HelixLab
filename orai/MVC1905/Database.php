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
    
    public function safeText($str) {
//        $t = trim($str);
//        $s = strip_tags($t);
//        $safe = mysqli_real_escape_string($this->conn, $s);
//        return $safe;
        return mysqli_real_escape_string($this->conn, strip_tags(trim($str)));
    }
}
?>

