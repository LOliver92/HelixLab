function newAccount(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "MainPageView.html";
}
}

//sendrecive:
function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            //alert(rd);
            if(processName == "newAccount") { newAccount(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}
//Registration
function createNewAccount(){
    var userRegName = document.getElementById("userRegName");
    var passwordReg = document.getElementById("passwordReg");
    var passwordReg2 = document.getElementById("passwordReg2");
    var email = document.getElementById("email");
    var firstname = document.getElementById("firstname");
    var surename = document.getElementById("surename");
    var birthdate = document.getElementById("birthdate");
    
    if(document.getElementById("genderMale").checked){
        var gender = "male";
    }
    else if(document.getElementById("genderFemale").checked){
        var gender = "female";
    }
    else {
        var gender = "other";
    }
    var data = {'task':'newAccount', 'userRegName' : userRegName.value.trim(), 'passwordReg' : passwordReg.value.trim(), 'passwordReg2' : passwordReg2.value.trim(), 
                'email' : email.value.trim(), 'firstname' : firstname.value.trim(), 'surename' : surename.value.trim(), 'birthdate' : birthdate.value.trim(), 'gender' : gender};
    if(userRegName.value.trim() != "" && passwordReg.value.trim() != "" && passwordReg2.value.trim() != "" && email.value.trim() != "" && firstname.value.trim() != "" &&
       surename.value.trim() != "" && birthdate.value.trim() != ""){
        sendRecive("../Controller/AccountController.php", data, "newAccount");
    }
    else{
        alert("Missing datas!");
    }
}//end of Registration

function showpasswordMsg(){
    document.getElementById("pwMsg").style.display = "block";
}

function hidepasswordMsg(){
    document.getElementById("pwMsg").style.display = "none";
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

