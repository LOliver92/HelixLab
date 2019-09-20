<?php
    require_once '../Model/AccountModel.php';
    require_once '../Model/DatabaseModel.php';
    require_once '../Model/Cycling.php';
    require_once '../Model/Running.php';
    require_once '../Model/Swimming.php';
    header('Content-Type: application/json');
    
    
    //GET ALL FUNCTIONS
    if(isset($_POST['task']) && $_POST['task'] == "getCyclingResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $AllCyclingResults = Cycling::getAllCyclingResults($data);
        print_r($AllCyclingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getRunningResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $AllRunningResult = Running::getAllRunningResults($data);
        print_r($AllRunningResult);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "getSwimmingResults"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $AllSwimmingResults = Swimming::getAllSwimmingResults($data);
        print_r($AllSwimmingResults);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    //GROUP BY FUNCTIONS
    //CYCLING
    if(isset($_POST['task']) && $_POST['task'] == "groupCyclingByFemale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $femaleCyclist= Cycling::groupCyclingByFemale($data);
        print_r($femaleCyclist);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupCyclingByMale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $maleCyclist= Cycling::groupCyclingByMale($data);
        print_r($maleCyclist);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupCyclingByOther"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $otherCyclist= Cycling::groupCyclingByOther($data);
        print_r($otherCyclist); 
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    //RUNNING
    if(isset($_POST['task']) && $_POST['task'] == "groupRunningByFemale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $femaleRunner = Running::groupRunningByFemale($data);
        print_r($femaleRunner); 
        $data[]=null;
        $conn = $db->close();
        $db = null;

    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupRunningByMale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $maleRunner = Running::groupRunningByMale($data);
        print_r($maleRunner);  
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupRunningByOther"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $otherRunner = Running::groupRunningByOther($data);
        print_r($otherRunner); 
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    //SWIMMING
    if(isset($_POST['task']) && $_POST['task'] == "groupSwimmingByFemale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $femaleSwimmer = Swimming::groupSwimmingByFemale($data);
        print_r($femaleSwimmer);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupSwimmingByMale"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $maleSwimmer = Swimming::groupSwimmingByMale($data);
        print_r($maleSwimmer);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
    
    if(isset($_POST['task']) && $_POST['task'] == "groupSwimmingByOther"){
        $db = new Database();
        $conn = $db->getConn(); 
        $data = array();
        $data['conn'] = $conn;
        $otherSwimmer = Swimming::groupSwimmingByOther($data);
        print_r($otherSwimmer);
        $data[]=null;
        $conn = $db->close();
        $db = null;
    }
