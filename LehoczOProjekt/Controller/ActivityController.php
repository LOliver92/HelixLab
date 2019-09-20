<?php
    require_once '../Model/AccountModel.php';
    require_once '../Model/DatabaseModel.php';
    require_once '../Model/Cycling.php';
    require_once '../Model/Running.php';
    require_once '../Model/Swimming.php';
    header('Content-Type: application/json');
    error_reporting(E_ALL ^ E_NOTICE);
    
     if(isset($_POST['task']) && $_POST['task'] == "newCyclingActivity"){
         if(isset($_POST['numLongOfActKm']) &&
                isset($_POST['numLongOfActM']) &&
                isset($_POST['timeOfAct']) &&
                isset($_POST['dateOfAct'])){
             
                $db = new Database();
                $conn = $db->getConn(); 
                $data = array();
                $data['conn'] = $conn;
                $data['username'] = $_SESSION['userdata']['username'];
                $data['gender'] = $_SESSION['userdata']['gender'];
                $data['age'] = $_SESSION['userdata']['age'];
                $data['birthdate'] = $_SESSION['userdata']['birthdate'];
                $data['longOfAct'] = $db->safeText($_POST['numLongOfActKm']) + $db->safeText($_POST['numLongOfActM'])/1000;
                $data['timeOfAct'] = $db->safeText($_POST['timeOfAct']);
                $data['dateOfAct'] = $db->safeText($_POST['dateOfAct']);
                Cycling::newCyclingActivity($data);
                $data[]=null;
                $conn = $db->close();
                $db = null;
        }
       else{
            print('{"result":"0","msg":"A task jó, de az adatok nem jönnek át!"}');
        }
     }
     
     if(isset($_POST['task']) && $_POST['task'] == "newRunningActivity"){
         if(isset($_POST['numLongOfActKm']) &&
                isset($_POST['numLongOfActM']) &&
                isset($_POST['timeOfAct']) &&
                isset($_POST['dateOfAct'])){
             
                $db = new Database();
                $conn = $db->getConn(); 
                $data = array();
                $data['conn'] = $conn;
                $data['username'] = $_SESSION['userdata']['username'];
                $data['gender'] = $_SESSION['userdata']['gender'];
                $data['age'] = $_SESSION['userdata']['age'];
                $data['birthdate'] = $_SESSION['userdata']['birthdate'];
                $data['longOfAct'] = $db->safeText($_POST['numLongOfActKm']) + $db->safeText($_POST['numLongOfActM'])/1000;
                $data['timeOfAct'] = $db->safeText($_POST['timeOfAct']);
                $data['dateOfAct'] = $db->safeText($_POST['dateOfAct']);
                Running::newRunningActivity($data);
                $data[]=null;
                $conn = $db->close();
                $db = null;
        }
       else{
            print('{"result":"0","msg":"A task jó, de az adatok nem jönnek át!"}');
        }
     }
     
     if(isset($_POST['task']) && $_POST['task'] == "newSwimmingActivity"){
         if(isset($_POST['numLongOfActKm']) &&
                isset($_POST['numLongOfActM']) &&
                isset($_POST['timeOfAct']) &&
                isset($_POST['dateOfAct'])){
             
                $db = new Database();
                $conn = $db->getConn(); 
                $data = array();
                $data['conn'] = $conn;
                $data['username'] = $_SESSION['userdata']['username'];
                $data['gender'] = $_SESSION['userdata']['gender'];
                $data['age'] = $_SESSION['userdata']['age'];
                $data['birthdate'] = $_SESSION['userdata']['birthdate'];
                $data['longOfAct'] = $db->safeText($_POST['numLongOfActKm']) + $db->safeText($_POST['numLongOfActM'])/1000;
                $data['timeOfAct'] = $db->safeText($_POST['timeOfAct']);
                $data['dateOfAct'] = $db->safeText($_POST['dateOfAct']);
                Swimming::newSwimmingActivity($data);
                $data[]=null;
                $conn = $db->close();
                $db = null;
        }
       else{
            print('{"result":"0","msg":"A task jó, de az adatok nem jönnek át!"}');
        }
     }
?>

