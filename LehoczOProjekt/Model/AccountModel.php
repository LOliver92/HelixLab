<?php
require_once 'DatabaseModel.php';
header('Content-Type: application/json');
session_start();
class Account {
   private $id;
   private $username;
   private $password;
   private $email;
   private $firstname;
   private $surename;
   private $birthdate;
   private $age;
   private $gender;
   private $regTime;
   
   
   //CONTRUCTOR
   public function __construct($id, $username, $password, $email, $firstname, $surename, $birthdate, $age, $gender, $regTime){
       $this->id = $id;
       $this->username = $username;
       $this->password = $password;
       $this->email = $email;
       $this->firstname = $firstname;
       $this->surename = $surename;
       $this->birthdate = $birthdate;
       $this->age = $age;
       $this->gender = $gender;
       $this->regTime = $regTime;
}

//GETTER
    public function getId(){
        return $this->id;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
     public function getEmail(){
        return $this->email;
    }
    
    public function getFirstname(){
        return $this->firstname;
    }
    
    public function getSurename(){
        return $this->surename;
    }
    
    public function getBirthdate(){
        return $this->birthdate;
    }
    
    public function getAge(){
        return $this->age;
    }
    
    public function getGender(){
        return $this->gender;
    }
    
    public function getRegTime(){
        return $this->regTime;
    }
    
    //SETTER
    public function setId($id){
        $this->id = $id;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    
    public function setSurename($surename){
        $this->surename = $surename;
    }
    
    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }
    
     public function setAge($age){
        $this->age = $age;
    }
    
    public function setGender($gender){
        $this->gender = $gender;
    }
    
    public function setRegTime($regTime){
        $this->regTime = $regTime;
    }
    
    //CRUD
    //CREATE  
    //Registration
    public static function registration($data) {
        mysqli_set_charset($data['conn'], 'utf8');
        //2. lépés natív SQL vagy tárolt eljárás meghívása/megírása
        $sql ='INSERT INTO users(id, username, password, email, firstname, surename, birthdate, age, gender, regTime) VALUES (NULL, "'.$data['userRegName'].'", "'.sha1($data['passwordReg']).'", "'.$data['email'].'", "'.$data['firstname'].'", "'.$data['surename'].'", "'.$data['birthdate'].'", "'.$data['age'].'", "'.$data['gender'].'", "'.$data['regTime'].'")';
        //2,5. lépés megnézzük hogy a felhasználónév szabad-e!!!!!!!!
        $sqEll = 'SELECT * FROM users WHERE username="'.$data['userRegName'].'"';
        $result = mysqli_query($data['conn'], $sqEll);
        if (mysqli_num_rows($result)==0){
        //3. lépés lefuttatjuk az sql parancsunkat
        $query = mysqli_query($data['conn'], $sql);
        if($query){
            print('{"result":"1","msg":"The registration was succesful!"}');
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
        }
        else {
            print('{"result":"0","msg":"The username has been already taken!"}');
        }
    }// end of Registration
    
    
    //READ
    //Login
     public static function login($data) {
        mysqli_set_charset($data['conn'], 'utf8');
        //2. lépés natív SQL vagy tárolt eljárás meghívása/megírása
        $sql ='SELECT * FROM users WHERE username="'. $data['username'] .'" AND password="'. sha1($data['password']).'"';
        
        $result = mysqli_query($data['conn'], $sql);
        
        if(mysqli_num_rows($result)==1){
            $userArray = mysqli_fetch_assoc($result);
            $_SESSION['userdata']=$userArray;
            print('{"result":"1","msg":"Log in was succesful!"}');
        }
        else{
            print('{"result":"0","msg":"The username or password is wrong!"}');
        }
    }//end of Login
   
    
    public static function getUserById ($data){
        if(isset($_SESSION['userdata'])){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'SELECT * FROM users WHERE id="'.$_SESSION['userdata']['id'].'"';
        $result = mysqli_query($data['conn'], $sql);
        $userArray = array();
        $userArray = mysqli_fetch_assoc($result);
        $_SESSION['userdata']=$userArray;
        return json_encode($userArray);
       }
       else{
           header('location:View/MainPageView.html');
           exit();
       }
    }
    
    
    //UPDATE

    //AGE
    public static function updateAge($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'CALL updateAgeUsers()';
        $result = mysqli_query($data['conn'], $sql);
        if($result){
            $sqlcyclingact = 'CALL updateAgeCycling()';
            $resultcycling = mysqli_query($data['conn'], $sqlcyclingact);
            $sqlrunningact = 'CALL updateAgeRunning()';
            $resultrunning = mysqli_query($data['conn'], $sqlrunningact);
            $sqlswimmingact = 'CALL updateAgeSwimming()';
            $resultswimming =mysqli_query($data['conn'], $sqlswimmingact);
            if($resultcycling == true && $resultrunning == true && $resultswimming == true){
                print('{"result":"1"}');
            }
        }
        else{
            print('{"result":"0"}');
        }
    }
    
    //PASSWORD
    public static function updatePw($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sqEll = 'SELECT * FROM users WHERE username="'.$_SESSION['userdata']['username'].'" AND password="'. sha1($data['oldPw']).'"';
        $resultEll = mysqli_query($data['conn'], $sqEll);
        if(mysqli_num_rows($resultEll)==1){
            $sql = 'UPDATE users SET password="'.sha1($data['newPw']).'" WHERE id="'.$_SESSION['userdata']['id'].'"';
            $result = mysqli_query($data['conn'], $sql);
            if($result){
                 print('{"result":"1","msg":"The change of password was succesful!"}');
            }
            else{
                print('{"result":"0","msg":"Something went wrong!"}');
            }
        }
        else{
            print('{"result":"0","msg":"The old password is not correct!"}');
        }
    }
    
    //PROFILE
    public static function updateProfile($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'UPDATE users SET username = "'.$data['newUsername'].'", email = "'.$data['newEmail'].'", firstname = "'.$data['newFirstname'].'", surename = "'.$data['newSurename'].'", birthdate = "'.$data['newBirthdate'].'", age = "'.$data['newAge'].'", gender = "'.$data['gender'].'" WHERE id = "'.$data['id'].'"';
        $sqEll = 'SELECT * FROM users WHERE username="'.$data['newUsername'].'"';
        $resultEll = mysqli_query($data['conn'], $sqEll);
        if (mysqli_num_rows($resultEll)==0){
            $result = mysqli_query($data['conn'], $sql);
            if($result){
                $sqlCycling = 'UPDATE cyclingactivity SET username = "'.$data['newUsername'].'", birthdate = "'.$data['newBirthdate'].'", age = "'.$data['newAge'].'", gender = "'.$data['gender'].'" WHERE username="'.$_SESSION['userdata']['username'].'"';
                $resultCycling = mysqli_query($data['conn'], $sqlCycling);
                $sqlRunning = 'UPDATE runningactivity SET username = "'.$data['newUsername'].'", birthdate = "'.$data['newBirthdate'].'", age = "'.$data['newAge'].'", gender = "'.$data['gender'].'" WHERE username="'.$_SESSION['userdata']['username'].'"';
                $resultRunning = mysqli_query($data['conn'], $sqlRunning);
                $sqlSwimming = 'UPDATE swimmingactivity SET username = "'.$data['newUsername'].'", birthdate = "'.$data['newBirthdate'].'", age = "'.$data['newAge'].'", gender = "'.$data['gender'].'" WHERE username="'.$_SESSION['userdata']['username'].'"';
                $resultSwimming = mysqli_query($data['conn'], $sqlSwimming);
                if($resultCycling == true && $resultRunning == true && $resultSwimming == true){
                    print('{"result":"1","msg":"The change of personal data was succesful!"}');
                    $_SESSION['userdata']['username'] = null;
                }
            }
            else{
                    print('{"result":"0","msg":"Something went wrong!"}');
                }
        }
        else{
                    print('{"result":"0","msg":"The username has been already taken!"}');
                }
    }


    //DELETE
    public static function deleteUser ($data){
        mysqli_set_charset($data['conn'], 'utf8');
        $sql = 'DELETE FROM users WHERE username="'.$_SESSION['userdata']['username'].'"';
        $result = mysqli_query($data['conn'], $sql);
        if($result){
            $sqlcyclingact='DELETE FROM cyclingactivity WHERE username="'.$_SESSION['userdata']['username'].'"';
            $resultcycling =mysqli_query($data['conn'], $sqlcyclingact);
            $sqlrunningact='DELETE FROM runningactivity WHERE username="'.$_SESSION['userdata']['username'].'"';
            $resultrunning =mysqli_query($data['conn'], $sqlrunningact);
            $sqlswimmingact='DELETE FROM swimmingactivity WHERE username="'.$_SESSION['userdata']['username'].'"';
            $resultswimming =mysqli_query($data['conn'], $sqlswimmingact);
            
            if($resultcycling == true && $resultrunning == true && $resultswimming == true){
                print('{"result":"1","msg":"The delete of your profile was succesful!"}');
            }
        }
        else{
            print('{"result":"0","msg":"Something went wrong!"}');
        }
    }
}