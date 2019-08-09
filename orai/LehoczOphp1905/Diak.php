<?php
//beillesztjük a Database.php fájlunkat, hogy tudunk csatlakozni az adatbázishoz
require_once 'Database.php';

//létrehozzuk a Diák osztályt az adatbázisban lévő diak tábla alapján
class Diak {
    private $id;
    private $nev;
    private $kor;
    private $osztaly;
    
 //létrehozzuk a contructorunkat, hogy lehetőségünk legyen a diák táblában új diák felvételére   
    public function __construct($id, $nev, $kor, $osztaly) {
        $this->id = $id;
        $this->nev = $nev;
        $this->kor = $kor;
        $this->osztaly = $osztaly;
    }
    
 //getterek létrehozásának kezdete   
    public function getId() {
        return $this->id;  
    }
    
     public function getNev() {
        return $this->nev;  
    }
    
     public function getKor() {
        return $this->kor;  
    }
    
     public function getOsztaly() {
        return $this->osztaly;  
    }
 // getterek létrehozásának vége
    
//setterek létrehozásának kezdete    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNev($nev){
        $this->nev = $nev;
    }
    
    public function setKor($kor){
        $this->kor = $kor;
    }
    
    public function setOsztaly($osztaly){
        $this->osztaly = $osztaly;
    }
//setterek létrehozásának vége

//CRUD eljárás
//1. lépés CREATE
    public static function newDiak($nev, $kor, $osztaly){
        //adatbázis kapcsolat létrehozása
        $db = new Database();
        $conn = $db->getConn();
        mysqli_set_charset($conn, 'utf8');
        
        //natív sql parancs létrehozása
        $sql = 'INSERT INTO diak (id, nev, kor, osztaly) VALUES (NULL, "'.$nev.'", "'.$kor.'", "'.$osztaly.'")';
        //query létrehozása
        $query = mysqli_query($conn, $sql);
        
        //beillesztés sikerességének leellenőrzése egy üzenettel
        if ($query){
            $message ="Sikeresen felvetted a diákot a rendszerbe!";
            print ("<script type='text/javascript'>alert('$message');</script>");
            //header('location:LehoczOIndex.php');
        }
        else {
            $messerr ="Sajnos nem sikerült felvenned a diákot a rendszerbe!";
            print ("<script type='text/javascript'>alert('$messerr');</script>");
        }
        //adatbázis kapcsolat objektumának törlése, majd adatbázis kapcsolat beárása
        $conn = NULL;
        $db->close();
    }
    
    
 //2. lépés READ
    public static function getOneDiakById($id) {
        //adatbázis kapcsolat létrehozása
        $db = new Database();
        $conn = $db->getConn();
        mysqli_set_charset($conn, 'utf8');
        
        //natív sql parancs létrehozása
        $sql = 'SELECT * FROM diak WHERE id="'.$id.'"';
        //query létrehozása
        $result = mysqli_query($conn, $sql);
        
        //leellenőrizzük, hogy 1 visszatérő adat van-e, ammenyiben TRUE, akkor beállítjuk az object tulajdonságait, majd kiíratjuk a diák adatatit
        if(mysqli_num_rows($result)==1){
            //létrehozunk egy üres tömböt, amibe majd beimportáljuk a diák adatait
            $tomb = mysqli_fetch_assoc($result);
            $l = new Diak($tomb['id'], $tomb['nev'], $tomb['kor'], $tomb['osztaly']);
            return $l;
        }
        
         //adatbázis kapcsolat objektumának törlése, majd adatbázis kapcsolat beárása
        $conn = NULL;
        $db->close();    
    }
    
    //2. lépés READ MINDENRE
    public static function getAllDiak(){
        //adatbázis kapcsolat létrehozása
        $db = new Database();
        $conn = $db->getConn();
        mysqli_set_charset($conn, 'utf8');
        
        $sql = 'SELECT * FROM diak';
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result)>0){
            $tomb = array();
            while ($row = mysqli_fetch_object($result)){
                $tomb[] = $row;
            }
            print_r($tomb);
        }
    }


    //3. lépés UPDATE
    public static function updateDiak($id, $nev, $kor, $osztaly){
        //adatbázis kapcsolat létrehozása
        $db = new Database();
        $conn = $db->getConn();
        mysqli_set_charset($conn, 'utf8');
        
        //natív sql parancs létrehozása
        $sql = 'UPDATE diak SET nev="'.$nev.'", kor="'.$kor.'", osztaly="'.$osztaly.'" WHERE id="'.$id.'"';
        //query létrehozása
        $result = mysqli_query($conn, $sql);
        
        if($result){
            $message ="Sikeresen módosítottad a diák adatait!";
            print ("<script type='text/javascript'>alert('$message');</script>");
        }
        else {
            $messerr ="Sikertelen hadművelet!";
            print ("<script type='text/javascript'>alert('$messerr');</script>");
        }
        $conn = NULL;
        $db->close();
        
    }
    
  //4. lépés DELETE
    public function deleteDiak(){
        //adatbázis kapcsolat létrehozása
        $db = new Database();
        $conn = $db->getConn();
        mysqli_set_charset($conn, 'utf8');
        
        //natív sql parancs létrehozása
        $sql = 'DELETE FROM diak WHERE id="'.$this->id.'"';
        $result = mysqli_query($conn, $sql);
        if($result){
            $message ="Sikeresen törölted a diák adatait!";
            print ("<script type='text/javascript'>alert('$message');</script>");
            $this->id=NULL;
            $this->nev=NULL;
            $this->kor=NULL;
            $this->osztaly=NULL;
        }
        else {
            $messerr ="Sikertelen hadművelet!";
            print ("<script type='text/javascript'>alert('$messerr');</script>");
        }
        $conn = NULL;
        $db->close();
        
    }
    
    
    
    
}

