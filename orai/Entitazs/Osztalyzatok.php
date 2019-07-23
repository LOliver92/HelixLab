<?php
require_once 'Database.php';

class Osztalyzatok {
     private $id;
      private $diakId;
      private $tantargyId;
      private $jegy;
     
      
      public function __construct($newId, $newdiakId, $newtantargyId, $newjegy) {
           $this->id = $newId;
           $this->diakId = $newdiakId;
           $this->tantargyId = $newtantargyId;
           $this->jegy = $newjegy;
       }
        public function getId (){
          return $this->id;
      }
      public function getDiakId (){
          return $this->diakId;
      }
      public function getTantargyId (){
          return $this->tantargyId;
      }

      public function getJegy (){
          return $this->jegy;
      }
      
      public function setId ($id1) {
            $this->id = $id1;
        }
        public function setDiakId ($diakId1) {
            $this->diakId = $diakId1;
        }
        public function setTantargyId ($tantargyId1) {
            $this->tantargyId = $tantargyId1;
        }
        
        public function setJegy ($jegy1) {
            $this->jegy = $jegy1;
        }
        
        public static function newOsztalyzat ($diakId, $tantargyId, $jegy){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'INSERT INTO osztalyzatok (diakId, tantargyId, jegy) VALUES "'.$diakId.'", "'.$tantargyId.'", "'.$jegy.'" ';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen felvetted az osztályzatot';
            }
            else {
                print 'Sikertelen felvétel';
            }
            $d->close();
        }
        
         //Read (1 tantárgy lekérdezése)
        public function readOsztalyzat($id) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'SELECT * FROM osztalyzatok WHERE id= "'.$id.'"';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            // Megnézzük, hogy egy visszatérő adat van-e, ha igen beállítjuk az object tulajdonságait
            if(mysqli_num_rows($result)==1){
                // létrehozunk egy üres tömböt, és ebbe betöltjük a fetch assoc függvény értékeit
                $a = array();
                $a = mysqli_fetch_assoc($result);
                
                // objektum értékeinek megadása, mivel dinamikus objectnek hívtuk meg $this a hivatkozás
                $this->setId($a['id']);
                $this->setDiakId($a['diakId']);
                $this->setTantargyId($a['tantargyId']);
                $this->setJegy($a['jegy']);
                
                print_r($this);
        }
         $d->close();   
        }
        
        public function updateJegy($jegy) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'UPDATE tantargy SET jegy ="'.$jegy.'" WHERE id = "'.$this->id.'"';
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen adtál új jegyet';
            }
            else {
                print 'Sikertelen jegyadás';
            }
            //lezárjuk a kapcsolatot
            $d->close();
        }
        
        public static function deleteJegyById ($id){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'DELETE jegy FROM osztalyzatok WHERE id = "'.$id.'"';
            
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