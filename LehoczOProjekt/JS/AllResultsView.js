//INVOKE FUNCTION
//GET ALL
function getCyclingDatas(rd){
    var cyclingData = document.getElementById("cyclingResults");
    cyclingData.innerHTML = "";
    cyclingData.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupCyclingByGender" onclick="groupCyclingByGender()"><option value="gender">Gender</option><option value="female">Female</option><option value="male">Male</option><option value="other">Other</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       cyclingData.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function getRunningDatas(rd){
    var runningData = document.getElementById("runningResults");
    runningData.innerHTML = "";
    runningData.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupRunningByGender" onclick="groupRunningByGender()"><option value="gender">Gender</option><option value="female">Female</option><option value="male">Male</option><option value="other">Other</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       runningData.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>';
        }
}

function getSwimmingDatas(rd){
    var swimmingData = document.getElementById("swimmingResults");
    swimmingData.innerHTML = "";
    swimmingData.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupSwimmingByGender" onclick="groupSwimmingByGender()"><option value="gender">Gender</option><option value="female">Female</option><option value="male">Male</option><option value="other">Other</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
        swimmingData.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
    }
}

//GROUP BY FUNCTIONS
//CYCLING
function groupCyclingResultByFemale(rd){
    var femaleCyclist = document.getElementById("cyclingResults");
    femaleCyclist.innerHTML = "";
    femaleCyclist.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupCyclingByGender" onclick="groupCyclingByGender()"><option>Gender</option><option value="male">Male</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       femaleCyclist.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupCyclingResultByMale(rd){
    var maleCyclist = document.getElementById("cyclingResults");
    maleCyclist.innerHTML = "";
    maleCyclist.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupCyclingByGender" onclick="groupCyclingByGender()"><option>Gender</option><option value="female">Female</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       maleCyclist.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupCyclingResultByOther(rd){
    var  otherCyclist = document.getElementById("cyclingResults");
    otherCyclist.innerHTML = "";
     otherCyclist.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupCyclingByGender" onclick="groupCyclingByGender()"><option>Gender</option><option value="female">Female</option><option value="male">Male</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
        otherCyclist.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

//RUNNING
function groupRunningResultByFemale(rd){
    var femaleRunner = document.getElementById("runningResults");
    femaleRunner.innerHTML = "";
    femaleRunner.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupRunningByGender" onclick="groupRunningByGender()"><option>Gender</option><option value="male">Male</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       femaleRunner.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupRunningResultByMale(rd){
    var maleRunner = document.getElementById("runningResults");
    maleRunner.innerHTML = "";
    maleRunner.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupRunningByGender" onclick="groupRunningByGender()"><option>Gender</option><option value="female">Female</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       maleRunner.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupRunningResultByOther(rd){
    var  otherRunner = document.getElementById("runningResults");
    otherRunner.innerHTML = "";
     otherRunner.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupRunningByGender" onclick="groupRunningByGender()"><option>Gender</option><option value="female">Female</option><option value="male">Male</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
        otherRunner.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}


//SWIMMING
function groupSwimmingResultByFemale(rd){
    var femaleSwimmer = document.getElementById("swimmingResults");
    femaleSwimmer.innerHTML = "";
    femaleSwimmer.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupSwimmingByGender" onclick="groupSwimmingByGender()"><option>Gender</option><option value="male">Male</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       femaleSwimmer.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupSwimmingResultByMale(rd){
    var maleSwimmer = document.getElementById("swimmingResults");
    maleSwimmer.innerHTML = "";
    maleSwimmer.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupSwimmingByGender" onclick="groupSwimmingByGender()"><option>Gender</option><option value="female">Female</option><option value="other">Other</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
       maleSwimmer.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}

function groupSwimmingResultByOther(rd){
    var  otherSwimmer = document.getElementById("swimmingResults");
    otherSwimmer.innerHTML = "";
    otherSwimmer.innerHTML += '<tr><th>Date</th><th>Username</th><th><select id="groupSwimmingByGender" onclick="groupSwimmingByGender()"><option>Gender</option><option value="female">Female</option><option value="male">Male</option><option value="all">All</option></select></th><th>Age</th><th>Time</th><th>Distance</th></tr>';
    for(var i = 0; i < rd.length; i++){
        otherSwimmer.innerHTML += '<tr><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].username + '</td><td>' + rd[i].gender + '</td><td>' + rd[i].age + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td></tr>' ;
        }
}


//SENDRECIVE
function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "getCyclingDatas") { getCyclingDatas(rd); }
            if(processName == "getRunningDatas") { getRunningDatas(rd); }
            if(processName == "getSwimmingDatas") { getSwimmingDatas(rd); }
            if(processName == "groupCyclingResultByFemale") { groupCyclingResultByFemale(rd); }
            if(processName == "groupCyclingResultByMale") { groupCyclingResultByMale(rd); }
            if(processName == "groupCyclingResultByOther") { groupCyclingResultByOther(rd); }
            if(processName == "groupRunningResultByFemale") { groupRunningResultByFemale(rd); }
            if(processName == "groupRunningResultByMale") { groupRunningResultByMale(rd); }
            if(processName == "groupRunningResultByOther") { groupRunningResultByOther(rd); }
            if(processName == "groupSwimmingResultByFemale") { groupSwimmingResultByFemale(rd); }
            if(processName == "groupSwimmingResultByMale") { groupSwimmingResultByMale(rd); }
            if(processName == "groupSwimmingResultByOther") { groupSwimmingResultByOther(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}

//MAIN FUNCTION
function getAllResults(){
    getCyclingResults();
    getRunningResults();
    getSwimmingResults();
    Clock();
}


//GET ALL DATAS FUNCTION
 function getCyclingResults(){
        var data = {'task': 'getCyclingResults'};
        sendRecive("../Controller/AllResultsController.php", data, "getCyclingDatas");
    }
function getRunningResults(){
        var data = {'task': 'getRunningResults'};
        sendRecive("../Controller/AllResultsController.php", data, "getRunningDatas");
    }
function getSwimmingResults(){
        var data = {'task': 'getSwimmingResults'};
        sendRecive("../Controller/AllResultsController.php", data, "getSwimmingDatas");
    }

//GROUP BY FUNCTIONS
//CYCLING
function groupCyclingByGender(){
    var gender =document.getElementById("groupCyclingByGender");
    if(gender.value == "female"){
        var data = {'task': 'groupCyclingByFemale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupCyclingResultByFemale");
    }
    else if(gender.value == "male"){
        var data = {'task': 'groupCyclingByMale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupCyclingResultByMale");
    }
    else if (gender.value == "other") {
        var data = {'task': 'groupCyclingByOther'};
        sendRecive("../Controller/AllResultsController.php", data, "groupCyclingResultByOther");
    }
    else if(gender.value == "all"){
        getCyclingResults();
    }   
}


//RUNNING
function groupRunningByGender(){
    var gender =document.getElementById("groupRunningByGender");
    if(gender.value == "female"){
        var data = {'task': 'groupRunningByFemale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupRunningResultByFemale");
    }
    else if(gender.value == "male"){
        var data = {'task': 'groupRunningByMale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupRunningResultByMale");
    }
    else if (gender.value == "other") {
        var data = {'task': 'groupRunningByOther'};
        sendRecive("../Controller/AllResultsController.php", data, "groupRunningResultByOther");
    }
    else if(gender.value == "all"){
        getRunningResults();
    }   
}


//SWIMMING
function groupSwimmingByGender(){
    var gender =document.getElementById("groupSwimmingByGender");
    if(gender.value == "female"){
        var data = {'task': 'groupSwimmingByFemale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupSwimmingResultByFemale");
    }
    else if(gender.value == "male"){
        var data = {'task': 'groupSwimmingByMale'};
        sendRecive("../Controller/AllResultsController.php", data, "groupSwimmingResultByMale");
    }
    else if (gender.value == "other") {
        var data = {'task': 'groupSwimmingByOther'};
        sendRecive("../Controller/AllResultsController.php", data, "groupSwimmingResultByOther");
    }
    else if(gender.value == "all"){
        getSwimmingResults();
    }   
}


//CLOCK
function Clock(){
  var date = new Date();

  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  if (hours <= 9) {
    hours = "0" + hours;
  }
  if (minutes <= 9) {
    minutes = "0" + minutes;
  }
  if (seconds <= 9) {
    seconds = "0" + seconds;
  }

  var clockFace = hours + ':' + minutes + ':' + seconds;
  document.getElementById('clock').innerHTML = clockFace;
  setTimeout(function() {
    Clock();
  }, 1000);
}
Clock();



