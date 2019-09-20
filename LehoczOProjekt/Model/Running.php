<?php
    require_once 'DatabaseModel.php';
    header('Content-Type: application/json');
class Running {
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
    
    public static function newRunningActivity ($data) {
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'INSERT INTO runningactivity (username, gender, age, birthdate, longOfAct, timeOfAct, dateOfAct) VALUES ("'.$data['username'].'", "'.$data['gender'].'", "'.$data['age'].'", "'.$data['birthdate'].'", "'.$data['longOfAct'].'", "'.$data['timeOfAct'].'", "'.$data['dateOfAct'].'")';
        $query = mysqli_query($data['conn'], $sql);
        if($query){
            print('{"result":"1","msg":"The record of running activity was successful!"}');
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
    }
    
    public static function getMyRunningResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM runningactivity WHERE username="'.$data['username'].'" ORDER BY dateOfAct DESC';
        $result = mysqli_query($data['conn'], $sql);
        $runningResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $runningResult[] = $b;
        }
        return json_encode($runningResult);
    }
    
    public static function getMyTotalRunningResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT SUM(longOfAct) FROM runningactivity WHERE username="'.$data['username'].'"';
        $result = mysqli_query($data['conn'], $sql);
        if(mysqli_num_rows($result)==1){
            $resultTotal = mysqli_fetch_assoc($result);
            $totalResult = round($resultTotal['SUM(longOfAct)'],3);
            return json_encode($totalResult);
        }
    }
    
     public static function getAllRunningResults ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM runningactivity ORDER BY dateOfAct DESC';
        $result = mysqli_query($data['conn'], $sql);
        $runningResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $runningResult[] = $b;
        }
        return json_encode($runningResult);
    }
    
     public static function deleteRunningActivity ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'DELETE FROM runningactivity WHERE id="'.$data['id'].'"';
        $result =  mysqli_query($data['conn'], $sql);
        if($result){
            print('{"result":"1","msg":"The delete of running activity was successful!"}');
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
    }
    
    public static function groupRunningByFemale ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM runningactivity WHERE gender="female"';
        $result = mysqli_query($data['conn'], $sql);
       $runningResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $runningResult[] = $b;
        }
        return json_encode($runningResult);
    }
    
    public static function groupRunningByMale ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM runningactivity WHERE gender="male"';
        $result = mysqli_query($data['conn'], $sql);
        $runningResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $runningResult[] = $b;
        }
        return json_encode($runningResult);
    }
    
    public static function groupRunningByOther ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM runningactivity WHERE gender="other"';
        $result = mysqli_query($data['conn'], $sql);
        $runningResult = array();
        while($b = mysqli_fetch_assoc($result)){
            $runningResult[] = $b;
        }
        return json_encode($runningResult);
    }
}
    
?>
