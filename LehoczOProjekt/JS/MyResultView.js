function getMyCyclingData(rd){
    var cyclingData = document.getElementById("myCyclingResults");
    cyclingData.innerHTML = "";
    cyclingData.innerHTML += '<tr><th></th><th>Date</th><th>Time</th><th>Distance</th><th></th></tr>';
    for(var i = 0; i < rd.length; i++){
       cyclingData.innerHTML += '<tr><td>' + (i+1) + '</td><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td><td><button id="delete' + rd[i].id + '" onclick="deleteCyclingActivity(\'' + rd[i].id + '\')">Delete Activity</button></td></tr>' ;
        }
}

function getMyRunningData(rd){
    var runningData = document.getElementById("myRunningResults");
    runningData.innerHTML = "";
    runningData.innerHTML += '<tr><th></th><th>Date</th><th>Time</th><th>Distance</th><th></th></tr>';
    for(var i = 0; i < rd.length; i++){
        runningData.innerHTML += '<tr><td>' + (i+1) + '</td><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td><td><button id="delete' + rd[i].id + '" onclick="deleteRunningActivity(\'' + rd[i].id + '\')">Delete Activity</button></td></tr>' ;   
    }
}

function getMySwimmingData(rd){
    var swimmingData = document.getElementById("mySwimmingResults");
    swimmingData.innerHTML = "";
    swimmingData.innerHTML += '<tr><th></th><th>Date</th><th>Time</th><th>Distance</th><th></th></tr>';
    for(var i = 0; i < rd.length; i++){
        swimmingData.innerHTML += '<tr><td>' + (i+1) + '</td><td>' + rd[i].dateOfAct + '</td><td>' + rd[i].timeOfAct + '</td><td>' + rd[i].longOfAct + ' Km </td><td><button id="delete' + rd[i].id + '" onclick="deleteSwimmingActivity(\'' + rd[i].id + '\')">Delete Activity</button></td></tr>' ;
    }
}

function getMyTotalCyclingData(rd){
    var totalCyclingDataDist =  document.getElementById("myTotalCyclingDataDist");
    totalCyclingDataDist.innerHTML = "";
    totalCyclingDataDist.innerHTML += rd + ' Km';
}

function getMyTotalRunningData(rd){
    var totalRunningData =  document.getElementById("myTotalRunningData");
    totalRunningData.innerHTML = "";
    totalRunningData.innerHTML += rd + ' Km';
}

function getMyTotalSwimmingData(rd){
    var totalSwimmingData =  document.getElementById("myTotalSwimmingData");
    totalSwimmingData.innerHTML = "";
    totalSwimmingData.innerHTML += rd + ' Km';
}

function deleteMyCyclingAct(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "MyResultView.html";
    }
}

function deleteMyRunningAct(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "MyResultView.html";
    }
}

function deleteMySwimmingAct(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "MyResultView.html";
    }
}

function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "getMyCyclingData") { getMyCyclingData(rd); }
            if(processName == "getMyRunningData") { getMyRunningData(rd); }
            if(processName == "getMySwimmingData") { getMySwimmingData(rd); }
            if(processName == "getMyTotalCyclingData") { getMyTotalCyclingData(rd); }
            if(processName == "getMyTotalRunningData") { getMyTotalRunningData(rd); }
            if(processName == "getMyTotalSwimmingData") { getMyTotalSwimmingData(rd); }
            if(processName == "deleteMyCyclingAct") { deleteMyCyclingAct(rd); }
            if(processName == "deleteMyRunningAct") { deleteMyRunningAct(rd); }
            if(processName == "deleteMySwimmingAct") { deleteMySwimmingAct(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}

function getAllMyResults(){
    getMyCyclingResults();
    getMyRunningResults();
    getMySwimmingResults();
    getMyTotalCyclingResult();
    getMyTotalRunningResult();
    getMyTotalSwimmingResult();
    Clock();
}

 function getMyCyclingResults(){
        var data = {'task': 'getMyCyclingResults'};
        sendRecive("../Controller/MyResultsController.php", data, "getMyCyclingData");
    }
function getMyRunningResults(){
        var data = {'task': 'getMyRunningResults'};
        sendRecive("../Controller/MyResultsController.php", data, "getMyRunningData");
    }
function getMySwimmingResults(){
        var data = {'task': 'getMySwimmingResults'};
        sendRecive("../Controller/MyResultsController.php", data, "getMySwimmingData");
    }
    
function getMyTotalCyclingResult(){
    var data = {'task': 'getMyTotalCyclingResult'};
    sendRecive("../Controller/MyResultsController.php", data, "getMyTotalCyclingData");
}

function getMyTotalRunningResult(){
    var data = {'task': 'getMyTotalRunningResult'};
    sendRecive("../Controller/MyResultsController.php", data, "getMyTotalRunningData");
}

function getMyTotalSwimmingResult(){
    var data = {'task': 'getMyTotalSwimmingResult'};
    sendRecive("../Controller/MyResultsController.php", data, "getMyTotalSwimmingData");
}

function deleteCyclingActivity(id){
    var data = {'task':'deleteCyclingActivity', 'id':id};
    sendRecive("../Controller/MyResultsController.php", data, "deleteMyCyclingAct");
}

function deleteRunningActivity(id){
    var data = {'task':'deleteRunningActivity', 'id':id};
    sendRecive("../Controller/MyResultsController.php", data, "deleteMyRunningAct");
}

function deleteSwimmingActivity(id){
    var data = {'task':'deleteSwimmingActivity', 'id':id};
    sendRecive("../Controller/MyResultsController.php", data, "deleteMySwimmingAct");
}


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