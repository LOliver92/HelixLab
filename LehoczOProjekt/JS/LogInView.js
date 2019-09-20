function logIn(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "LoggedView.html";   
}
}

//sendrecive:
function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "logIn") { logIn(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}



//invoke functions:

//Login
function signIn(){
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var data = {'task':'logIn', 'username':username.value.trim(), 'password':password.value.trim()};
    if(username.value.trim() != "" && password.value.trim() != ""){
       sendRecive("../Controller/AccountController.php", data, "logIn");
    }
    else{
        alert("A felhasználónév vagy jelszó üres!");
    } 
}//end of Login


function mainFunction(){
    updateAge();
    Clock();
}

function updateAge(){
    var data = {'task': 'updateAge'};
    sendRecive("../Controller/AccountController.php", data, "mainPage");
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

