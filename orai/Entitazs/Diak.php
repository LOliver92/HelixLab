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
        
        //Update diak
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
        
        //Delete diák
        public static function deleteDiakById ($id){
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'CALL deleteDiakById ("'.$id.'")';
            
            $result = mysqli_query($conn, $sql);
            
            if($result){
                print 'Sikeresen törölted a rendszerből';
            }
            else {
                print 'Sikertelen törlés';
            }
            
            
            $sql= NULL;
            $result = NULL;
            //lezárjuk a kapcsolatot
            $d->close();
        }
        public static function updateAll($id, $nev, $kor, $osztaly) {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'UPDATE diak SET nev ="'.$nev.'", kor = "'.$kor.'", osztaly = "'.$osztaly.'" WHERE id = "'.$id.'"';
            $result = mysqli_query($conn, $sql);
            if($result){
                print 'Sikeresen ápdételted a tanuló minden adatát';
            }
            else {
                print 'Sikertelen ápdét';
            }
            
            /*if (empty($nev)){
                $sql = 'UPDATE diak SET kor = "'.$kor.'", osztaly = "'.$osztaly.'" WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló korát és osztályát';
                }
                else {
                    print 'Sikertelen ápdét';
                }
            }
            else if (empty($kor)){
                $sql = 'UPDATE diak SET nev ="'.$nev.'", osztaly = "'.$osztaly.'" WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló nevét és osztályát';
                }
                else {
                    print 'Sikertelen ápdét';
                }
            }
            else if (empty($osztaly)){
                $sql = 'UPDATE diak SET nev ="'.$nev.'", kor = "'.$kor.'", WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló nevét és korát';
                }
                else {
                    print 'Sikertelen ápdét';
                }
            }
            else if (empty($nev)&& empty ($kor)){
                $sql = 'UPDATE diak SET osztaly = "'.$osztaly.'" WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló osztályát';
                }
                else {
                    print 'Sikertelen ápdét';
                }
            }
            else if (empty($nev)&& empty ($osztaly)){
                $sql = 'UPDATE diak SET kor = "'.$kor.'" WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló korát';
                }
                else {
                    print 'Sikertelen ápdét';
                }
            }
            else if (empty($kor)&& empty ($osztaly)){
                $sql = 'UPDATE diak SET nev ="'.$nev.'" WHERE id = "'.$id.'"';
                $result = mysqli_query($conn, $sql);
                
                if($result){
                    print 'Sikeresen ápdételted a tanuló nevét';
                }
                else {
                    print 'Sikertelen ápdét';
                }
                
            }
            else if (empty($id)){
                print "Üres az Id";
            }
            else {
                print "Valami hiba történt";
            }*/
            $d->close();
            }
            
        public static function getAllDiak() {
            //Database példányosítása, ez által kapcsolat létrehozás.
            $d = new Database();
            $conn = $d->getConn(); //$conn-ban lesz a mysqli_connect függvényünk, ezt használjuk
            mysqli_set_charset($conn, 'utf8');
            
            $sql = 'CALL getAllDiak';
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result)>0){
                $ketDTomb = array();
                while($row = mysqli_fetch_object($result)){
                    $ketDTomb[] = $row;
                
                }
                print_r ($ketDTomb);
            }
            
            
            $d->close();
        }    
        
}
?>