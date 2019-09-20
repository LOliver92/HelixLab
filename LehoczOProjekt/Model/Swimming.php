<?php
    require_once 'DatabaseModel.php';
    header('Content-Type: application/json');
class Swimming {
   private $username;
   private $longOfAct;
   private $timeOfAct;
   private $dateOfAct;
   
    public function __construct($username, $longOfAct, $timeOfAct, $dateOfAct){
       $this->username = $username;
       $this->longOfAct = $longOfAct;
       $this->timeOfAct = $timeOfAct;
       $this->dateOfAct = $dateOfAct;
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getLongOfAct(){
        return $this->longOfAct;
    }
    
     public function getTmeOfAct(){
        return $this->timeOfAct;
    }
    
    public function getDateOfAct(){
        return $this->dateOfAct;
    }
 
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function setLongOfAct($longOfAct){
        $this->longOfAct = $longOfAct;
    }
    
    public function setTmeOfAct($timeOfAct){
        $this->timeOfAct = $timeOfAct;
    }
    
     public function setDateOfAct($dateOfAct){
        $this->dateOfAct = $dateOfAct;
    }
    
    public static function newSwimmingActivity ($data) {
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'INSERT INTO swimmingactivity (username, gender, age, birthdate, longOfAct, timeOfAct, dateOfAct) VALUES ("'.$data['username'].'", "'.$data['gender'].'",  "'.$data['age'].'", "'.$data['birthdate'].'", "'.$data['longOfAct'].'", "'.$data['timeOfAct'].'", "'.$data['dateOfAct'].'")';
        $query = mysqli_query($data['conn'], $sql);
        if($query){
            print('{"result":"1","msg":"The record of swimming activity was successful!"}');
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
    }
    
    public static function getMySwimmingResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM swimmingactivity WHERE username="'.$data['username'].'" ORDER BY dateOfAct DESC';
        $result = mysqli_query($data['conn'], $sql);
        $swimmingResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $swimmingResult[] = $b;
        }
        return json_encode($swimmingResult);
    }
    
    public static function getMyTotalSwimmingResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT SUM(longOfAct) FROM swimmingactivity WHERE username="'.$data['username'].'"';
        $result = mysqli_query($data['conn'], $sql);
        if(mysqli_num_rows($result)==1){
            $resultTotal = mysqli_fetch_assoc($result);
            $totalResult = round($resultTotal['SUM(longOfAct)'],3);
            return json_encode($totalResult);
        }
    }
    
    public static function getAllSwimmingResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM swimmingactivity ORDER BY dateOfAct DESC';
        $result = mysqli_query($data['conn'], $sql);
        $swimmingResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $swimmingResult[] = $b;
        }
        return json_encode($swimmingResult);
    }
    
     public static function deleteSwimmingActivity ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'DELETE FROM swimmingactivity WHERE id="'.$data['id'].'"';
        $result =  mysqli_query($data['conn'], $sql);
        if($result){
            print('{"result":"1","msg":"The delete of swimming activity was successful!"}');
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
    }
    
    public static function groupSwimmingByFemale ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM swimmingactivity WHERE gender="female"';
        $result = mysqli_query($data['conn'], $sql);
       $swimmingResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $swimmingResult[] = $b;
        }
        return json_encode($swimmingResult);
    }
    
    public static function groupSwimmingByMale ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM swimmingactivity WHERE gender="male"';
        $result = mysqli_query($data['conn'], $sql);
        $swimmingResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $swimmingResult[] = $b;
        }
        return json_encode($swimmingResult);
    }
    
    public static function groupSwimmingByOther ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM swimmingactivity WHERE gender="other"';
        $result = mysqli_query($data['conn'], $sql);
        $swimmingResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $swimmingResult[] = $b;
        }
        return json_encode($swimmingResult);
    }
}

?>
