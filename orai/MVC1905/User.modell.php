<?php
class User{
   private $id;
   private $name;
   private $password; 
   private $email;
   private $username;
   private $status;
    
   //paraméteres konstruktor
   public function __construct($id=null, $name=null, $password=null, $email=null, $username=null, $status=null){
       $this->id = $id;
       $this->name = $name;
       $this->password = $password;
       $this->email = $email;
       $this->username = $username;
       $this->status = $status;
}
   
   //getter
    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
   //setter
    public function setId($id){
        $this->id = $id;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
     public function setEmail($email){
        $this->email = $email;
    }
    
     public function setUsername($username){
        $this->username = $username;
    }
    
     public function setStatus($status){
        $this->status = $status;
    }
    
    
    //saját függvények létrehozása amit a kontrollerből meghívunk
    public static function login($db, $data) {
        $sql = 'SELECT * FROM user WHERE username="'.$data['user'].'" AND password ="'.sha1($data['pw']).'"';
        $query = mysqli_query($db, $sql);
         mysqli_set_charset($db, 'utf8');
         
         if(mysqli_num_rows($query)==1){
             print_r('{"msg":"Sikeres belépés"}');
             //object adatainak beállítása
             
         }
         else{
             print "Az adatok átmentek a kontroller szűrőin, de a találatok száma nem egyezik meg";
         }
        
    }
    
    
    
}

?>