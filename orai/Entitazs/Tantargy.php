<?php
require_once 'Database.php';

class Tantargy {
     private $id;
      private $nev;
      private $hetiOraszam;
     
      
      public function __construct($newId, $newNev, $newHetiOraszam) {
           $this->id = $newId;
           $this->nev = $newNev;
           $this->kor = $newHetiOraszam;
       }
        public function getId (){
          return $this->id;
      }
      public function getNev (){
          return $this->nev;
      }
      public function getHetiOraszam (){
          return $this->hetiOraszam;
      }
      
      public function setId ($id1) {
            $this->id = $id1;
        }
        public function setNev ($nev1) {
            $this->nev = $nev1;
        }
        public function setHetiOraszam ($hetiOraszam1) {
            $this->hetiOraszam = $hetiOraszam1;
        }
        
        public static function newTantargy ($nev, $hetiOraszam){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'INSERT INTO tantargyak (nev, hetiOraszam) VALUES "'.$nev.'", "'.$hetiOraszam.'"';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen felvetted a tantárgyat';
            }
            else {
                print 'Sikertelen felvétel';
            }
            $d->close();
        }
        
         //Read (1 tantárgy lekérdezése)
        public function readTantargy($id) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'SELECT * FROM tantargyak WHERE id= "'.$id.'"';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            // Megnézzük, hogy egy visszatérő adat van-e, ha igen beállítjuk az object tulajdonságait
            if(mysqli_num_rows($result)==1){
                // létrehozunk egy üres tömböt, és ebbe betöltjük a fetch assoc függvény értékeit
                $a = array();
                $a = mysqli_fetch_assoc($result);
                
                // objektum értékeinek megadása, mivel dinamikus objectnek hívtuk meg $this a hivatkozás
                $this->setId($a['id']);
                $this->setNev($a['nev']);
                $this->setHetiOraszam($a['HetiOraszam']);
                
                print_r($this);
        }
         $d->close();   
        }
        
        public function updateNev($nev) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'UPDATE tantargyak SET nev ="'.$nev.'" WHERE id = "'.$this->id.'"';
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen átnevezeted a tantárgyat';
            }
            else {
                print 'Sikertelen átnevezés';
            }
            //lezárjuk a kapcsolatot
            $d->close();
        }
        
        public static function deleteTantargyById ($id){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'DELETE FROM tantargyak WHERE id = "'.$id.'"';
            
            $result = mysqli_query($conn, $sql);
            
            if($result){
                print 'Sikeresen törölted a rendszerből';
            }
            else {
                print 'Sikertelen törlés';
            }
            //lezárjuk a kapcsolatot
            $d->close();
        }
        
        
    
}
