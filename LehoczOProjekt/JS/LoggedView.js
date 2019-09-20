function getUserData(rd){
    var user = document.getElementById("userData");
    user.innerHTML = "";
    user.innerHTML += rd.username;
}


function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "getUserData") { getUserData(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}

function getUser(){
    var data = {'task': 'getUser'};
    sendRecive("../Controller/AccountController.php", data, "getUserData");
    Clock();
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
