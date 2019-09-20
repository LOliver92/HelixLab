<?php
require_once '../Model/AccountModel.php';
require_once '../Model/DatabaseModel.php';
header('Content-Type: application/json');


    //CRUD
        //CREATE
        //Registration
    if(isset($_POST['task']) && $_POST['task'] == "newAccount"){
        // megnézzük mindkét mező ki van-e töltve
        if (isset($_POST['userRegName']) && !empty($_POST['userRegName']) &&
            isset($_POST['passwordReg']) && !empty($_POST['passwordReg']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['firstname']) && !empty($_POST['firstname']) &&
            isset($_POST['surename']) && !empty($_POST['surename'])&&
            isset($_POST['birthdate']) && !empty($_POST['birthdate']) &&
            isset($_POST['gender']) && !empty($_POST['gender'])){
                $email = $_POST['email'];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($_POST['passwordReg'])>=8 && strlen($_POST['passwordReg'])<=20){
                        if($_POST['passwordReg'] == $_POST['passwordReg2']){
                            $dateOfBirth = $_POST['birthdate'];
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                            $age = $diff->format('%y');
                            if($age>=10){
                                $t= time();
                                $regTime=(date("Y-m-d h:i:s",$t));

                                $db = new Database();
                                $conn = $db->getConn(); 
                                $data = array();
                                $data['conn'] = $conn;
                                $data['userRegName'] = $db->safeText($_POST['userRegName']);
                                $data['passwordReg'] = $db->safeText($_POST['passwordReg']);
                                $data['email'] = $db->safeText($email);
                                $data['firstname'] = ucfirst($db->safeText($_POST['firstname']));
                                $data['surename'] = ucfirst($db->safeText($_POST['surename']));
                                $data['birthdate'] = $db->safeText($_POST['birthdate']);
                                $data['gender'] = $db->safeText($_POST['gender']);
                                $data['age'] = $age;
                                $data['regTime'] = $regTime;
                                 //az adatok biztonságossá tétele, regisztráció függvény meghívása
                                Account::registration($data);
                                $data[]=null;
                                $conn = $db->close();
                                $db = null;
                            }
                            else{
                                print('{"result":"0","msg":"The page can be used people more than 10 years old!"}');
                            }
                        }
                        else{
                             print('{"result":"0","msg":"Passwords are not equal!"}');
                        }
                    }
                    else{
                             print('{"result":"0","msg":"Password has to be between 8-20 characters!"}');
                        }
            }
            else{
                 print('{"result":"0","msg":"The e-mail is not validl!"}');
                }   
        }
    }
    
    //READ
    //Login
    if(isset($_POST['task']) && $_POST['task'] == "logIn"){
        // megnézzük mindkét mező ki van-e töltve
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password'])){
            $db = new Database();
            $conn = $db->getConn();
            $data = array();
            $data['conn'] = $conn;
            $data['username'] = $db->safeText($_POST['username']);
            $data['password'] = $db->safeText($_POST['password']);
            Account::login($data);
            $data[]=null;
            $conn = $db->close();
            $db = null;
           
    }
        }
    
    
    if(isset($_POST['task']) && $_POST['task'] == "getUser"){
            $db = new Database();
            $conn = $db->getConn();
            $data = array();
            $data['conn'] = $conn;
            $a = Account::getUserById($data);
            print_r($a);
            $data[]=null;
            $conn = $db->close();
            $db = null;
    }
    
    //UPDATE
    //AGE
    if(isset($_POST['task']) && $_POST['task'] == "updateAge"){ 
            $db = new Database();
            $conn = $db->getConn();
            $data = array();
            $data['conn'] = $conn;
            Account::updateAge($data);
            $data[]=null;
            $conn = $db->close();
            $db = null;
    }
    
    //PASSWORD
    if(isset($_POST['task']) && $_POST['task'] == "changePw"){
        if(isset($_POST['oldPw']) && !empty($_POST['oldPw']) &&
           isset($_POST['newPw']) && !empty($_POST['newPw']) &&
           isset($_POST['newPw2']) && !empty($_POST['newPw2'])){
                if(strlen($_POST['newPw'])>=8 && strlen($_POST['newPw'])<=20){
                    if($_POST['newPw'] == $_POST['newPw2']){
                        $db = new Database();
                        $conn = $db->getConn();
                        $data = array();
                        $data['conn'] = $conn;
                        $data['oldPw'] = $db->safeText($_POST['oldPw']);
                        $data['newPw'] = $db->safeText($_POST['newPw']);
                        Account::updatePw($data);
                        $data[]=null;
                        $conn = $db->close();
                        $db = null;
                    }
                    else{
                         print('{"result":"0","msg":"Passwords are not equal!"}');
                        }
                }
               else{
                    print('{"result":"0","msg":"Password has to be between 8-20 characters!"}');
                    } 
       }
    }
    
    //PROFILE
    if(isset($_POST['task']) && $_POST['task'] == "updateProfile"){
        if(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 0 &&
           isset($_POST['newUsername']) && !empty($_POST['newUsername']) &&
           isset($_POST['newEmail']) && !empty($_POST['newEmail']) &&
           isset($_POST['newFirstname']) && !empty($_POST['newFirstname']) &&     
           isset($_POST['newSurename']) && !empty($_POST['newSurename']) &&
           isset($_POST['newBirthdate']) && !empty($_POST['newBirthdate']) && 
           isset($_POST['gender']) && !empty($_POST['gender'])){
                $email = $_POST['newEmail'];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $dateOfBirth = $_POST['newBirthdate'];
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                    $age = $diff->format('%y');
                    if($age>=10){
                        $db = new Database();
                        $conn = $db->getConn(); 
                        $data = array();
                        $data['conn'] = $conn;
                        $data['id'] = $db->safeText($_POST['id']);
                        $data['newUsername'] = $db->safeText($_POST['newUsername']);
                        $data['newEmail'] = $db->safeText($email);
                        $data['newFirstname'] = ucfirst($db->safeText($_POST['newFirstname']));
                        $data['newSurename'] = ucfirst($db->safeText($_POST['newSurename']));
                        $data['newBirthdate'] = $db->safeText($_POST['newBirthdate']);
                        $data['gender'] = $db->safeText($_POST['gender']);
                        $data['newAge'] = $age;
                        Account::updateProfile($data); 
                    }
                    else{
                        print('{"result":"0","msg":"The page can be used people more than 10 years old!"}');
                    }
                }
                else{
                    print('{"result":"0","msg":"The e-mail is not validl!"}'); 
                }
        }    
        
    }
    
    //DELETE
       if(isset($_POST['task']) && $_POST['task'] == "deleteUser"){ 
            $db = new Database();
            $conn = $db->getConn();
            $data = array();
            $data['conn'] = $conn;
            Account::deleteUser($data);
            $data[]=null;
            $conn = $db->close();
            $db = null;
       }
    
?>