<?php
require_once 'Database.php';
class Login {
   private $id;
   private $username;
   private $password;
   
   public function __construct($id, $username, $password){
       $this->id = $id;
       $this->username = $username;
       $this->password = $password;
}
    public function getId(){
        return $this->id;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    //Create
    public static function regisztracio($username, $password) {
        //1. lépés adatbázis kapcsolat megteremtése
        $db = new Database();
        $conn = $db->getConn(); //itt tároljuk el az adatbázis kapcsolatot
        //2. lépés natív SQL vagy tárolt eljárás meghívása/megírása
        $sql ='INSERT INTO login(id, username, password) VALUES (NULL, "'.$username.'", "'.sha1($password).'")';
        //2,5. lépés megnézzük hogy a felhasználónév szabad-e
        
        
        //3. lépés lefuttatjuk az sql parancsunkat
        $query = mysqli_query($conn, $sql);
        if($query){
            print ("Sikeres regisztráció");
            
        }
        $conn=NULL;
        $db->close();
    }
    
     public static function login($username, $password) {
        //1. lépés adatbázis kapcsolat megteremtése
        $db = new Database();
        $conn = $db->getConn(); //itt tároljuk el az adatbázis kapcsolatot
        //2. lépés natív SQL vagy tárolt eljárás meghívása/megírása
        $sql ='SELECT * FROM login WHERE username="'. $username .'" AND password="'. sha1($password).'"';
        //2,5. lépés megnézzük hogy a felhasználónév szabad-e
        
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)==1){
            /*$adat = mysqli_fetch_assoc($result); //id => 1, username => admin, password =>
            $_SESSION['userdata']=$adat;  //[userdata][id], [userdata][username], [userdata][password]*/
            $adat = mysqli_fetch_assoc($result); //id => 1, username => admin, password =>
            //header('location:logged.php');
            
            // csinálunk egy példányt, a belépésnél megadott adatokra
            $l = new login($adat['id'], $adat['username'], $adat['password']);
            return $l;
        }
        else{
            print "Hibás felhasználónév vagy jelszó";
        }
        $db->close();
    }
    
    public static function objectById($id){
        //1. lépés adatbázis kapcsolat megteremtése
        $db = new Database();
        $conn = $db->getConn(); //itt tároljuk el az adatbázis kapcsolatot
        //2. lépés natív SQL vagy tárolt eljárás meghívása/megírása
        $sql ='SELECT * FROM login WHERE id="'. $id .'"';
        
       $result = mysqli_query($conn, $sql);
       
        if(mysqli_num_rows($result)==1){
          $adat = mysqli_fetch_assoc($result);
          $l = new login($adat['id'], $adat['username'], $adat['password']);
          return $l; 
        }
        else{
            print "Hibás felhasználónév vagy jelszó";
        }
        $db->close();
        
    }
    
    public function jelszoCsere($regi, $uj){
        //megnézzük, hogy az objektum és adatbázis által tárolt jelszó megegyezik-e a
        //$regi megegyezik a paraméterben megadott régi jelszóval
        if($this->password == sha1($regi)){
            $db = new Database();
            $conn = $db->getConn();
            mysqli_set_charset($conn, 'utf8');
            $sql = 'UPDATE login SET password="'.sha1($uj).'" WHERE id="'.$this->id.'"';
            $query = mysqli_query($conn, $sql);
        if($query){
            print ("Sikeres jelszócsere");
            $this->password = sha1($uj);
        }
        }
        $db->close();
        
    }
    
    public function torles() {
                $db = new Database();
                $conn = $db->getConn();
                mysqli_set_charset($conn, 'utf8');
                $sql = 'DELETE FROM login WHERE id="'.$this->id.'"';
                $query = mysqli_query($conn, $sql);
                if($query){
                    print ("Sikeres törlés");
                    $this->id=NULL;
                    $this->username=NULL;
                    $this->password=NULL;
                }
                $db->close();
            }
     
    


}
?>

