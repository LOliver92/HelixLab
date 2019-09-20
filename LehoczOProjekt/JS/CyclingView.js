function newCyclingActivity(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "LoggedView.html";
    }
}

function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            //alert(rd);
            if(processName == "newCyclingActivity") { newCyclingActivity(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}

function recordNewAct(){
    var numLongOfActKm = document.getElementById("numLongOfActKm");
    var numLongOfActM = document.getElementById("numLongOfActM");
    var timeOfAct = document.getElementById("timeOfAct");
    var dateOfAct = document.getElementById("dateOfAct");
    var data = {'task':'newCyclingActivity', 'numLongOfActKm' : numLongOfActKm.value, 'numLongOfActM' : numLongOfActM.value,
                'timeOfAct' : timeOfAct.value, 'dateOfAct' : dateOfAct.value};
    if(numLongOfActKm.value != "" && numLongOfActM.value != "" && timeOfAct.value != "" &&  dateOfAct.value != ""){
        sendRecive("../Controller/ActivityController.php", data, "newCyclingActivity");
    }
    else{
       alert('Please fill all the text fields!');
    }
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

