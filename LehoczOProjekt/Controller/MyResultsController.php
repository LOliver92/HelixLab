<?php
    require_once '../Model/AccountModel.php';
    require_once '../Model/DatabaseModel.php';
    require_once '../Model/Cycling.php';
    require_once '../Model/Running.php';
    require_once '../Model/Swimming.php';
    header('Content-Type: application/json');
    
    if(isset($_POST['task']) && $_POST['task'] == "getMyCyclingResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MyCyclingResults = Cycling::getMyCyclingResults($data);
        print_r($MyCyclingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getMyRunningResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MyRunningResult = Running::getMyRunningResults($data);
        print_r($MyRunningResult);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getMySwimmingResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MySwimmingResults = Swimming::getMySwimmingResults($data);
        print_r($MySwimmingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getMyTotalCyclingResult"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MyTotalCyclingResults = Cycling::getMyTotalCyclingResults($data);
        print_r($MyTotalCyclingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getMyTotalRunningResult"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MyTotalRunningResults = Running::getMyTotalRunningResults($data);
        print_r($MyTotalRunningResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getMyTotalSwimmingResult"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['username'] = $_SESSION['userdata']['username'];
        $MyTotalSwimmingResults = Swimming::getMyTotalSwimmingResults($data);
        print_r($MyTotalSwimmingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    
if(isset($_POST['task']) && $_POST['task'] == "deleteCyclingActivity"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['id'] = $db->safeText($_POST['id']);
        Cycling::deleteCyclingActivity($data);
        $data[]=null;
        $conn = $db->close();
        $db = null;
}

if(isset($_POST['task']) && $_POST['task'] == "deleteRunningActivity"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['id'] = $db->safeText($_POST['id']);
        Running::deleteRunningActivity($data);
        $data[]=null;
        $conn = $db->close();
        $db = null;
}

if(isset($_POST['task']) && $_POST['task'] == "deleteSwimmingActivity"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $data['id'] = $db->safeText($_POST['id']);
        Swimming::deleteSwimmingActivity($data);
        $data[]=null;
        $conn = $db->close();
        $db = null;
}

