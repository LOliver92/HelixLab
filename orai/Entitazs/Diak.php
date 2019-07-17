<?php
require_once 'Database.php';

class Diak {
      private $id;
      private $nev;
      private $kor;
      private $osztaly;
      
       public function __construct($newId, $newNev, $newKor, $newOsztaly) {
           $this->id = $newId;
           $this->nev = $newNev;
           $this->kor = $newKor;
           $this->osztaly = $newOsztaly;
       }
      
      public function getId (){
          return $this->id;
      }
      public function getNev (){
          return $this->nev;
      }
      public function getKor (){
          return $this->kor;
      }
      public function getOsztaly (){
          return $this->osztaly;
      }
      
      public function setId ($id1) {
            $this->id = $id1;
        }
        public function setNev ($nev1) {
            $this->nev = $nev1;
        }
        public function setKor ($kor1) {
            $this->kor = $kor1;
        }
        public function setOsztaly ($osztaly1) {
            $this->osztaly = $osztaly1;
        }
        
        //CRUD létrehozása
        
        //Create
        public static function newDiak ($nev, $kor, $osztaly){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'CALL addNewDiak("'.$nev.'","'.$kor.'","'.$osztaly.'")';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen felvetted a diákot';
            }
            else {
                print 'Sikertelen felvétel';
            }
            
            //lezárjuk a kapcsolatot
            $d->close();
        }
        
        //Read (1 diák lekérdezése)
        public function readDiak($id) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            //sql parancs létrehozása
            $sql = 'SELECT * FROM diak WHERE id= "'.$id.'"';
            
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            // Megnézzük, hogy egy visszatérő adat van-e, ha igen beállítjuk az object tulajdonságait
            if(mysqli_num_rows($result)==1){
                // létrehozunk egy üres tömböt, és ebbe betöltjük a fetch assoc függvény értékeit
                $a = array();
                $a = mysqli_fetch_assoc($result);
                
                // objektum értékeinek megadása, mivel dinamikus objectnek hívtuk meg $this a hivatkozás
                $this->setId($a['id']);
                $this->setKor($a['kor']);
                $this->setNev($a['nev']);
                $this->setOsztaly($a['osztaly']);
                
                print_r($this);
        }
         $d->close();   
        }
        
        //update diak
        public function updateNev($nev) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'UPDATE diak SET nev ="'.$nev.'" WHERE id = "'.$this->id.'"';
            // sql parancs lefuttatása
            $result = mysqli_query($conn, $sql);
            
            //ellenőrizzük, hogy sikeres-e a beillesztés
            if($result){
                print 'Sikeresen átnevezeted a diákot';
            }
            else {
                print 'Sikertelen átnevezés';
            }
            //lezárjuk a kapcsolatot
            $d->close();
        }
        
}
?>