function getMyDatas(rd){
    var user = document.getElementById("profilContainer");
    user.innerHTML = "";
    user.innerHTML += '<strong>Username: </strong><strong class="uname">' + rd.username + '</strong><br>';
    user.innerHTML += '<strong>E-mail: </strong><strong class="uname">' + rd.email + '</strong><br>';
    user.innerHTML += '<strong>Firstname: </strong><strong class="uname">' + rd.firstname + '</strong><br>';
    user.innerHTML += '<strong>Surename: </strong><strong class="uname">' + rd.surename + '</strong><br>';
    user.innerHTML += '<strong>Birthdate: </strong><strong class="uname">' + rd.birthdate + '</strong><br>';
    user.innerHTML += '<strong>Age: </strong><strong class="uname">' + rd.age + '</strong><br>';
    user.innerHTML += '<strong>Gender: </strong><strong class="uname">' + rd.gender + '</strong><br>';
    user.innerHTML += '<strong>Registration time: </strong><strong class="uname">' + rd.regTime + '</strong><br>';
    user.innerHTML += '<button class="changePw" onclick="chngPw()">Change password</button><br>';
    user.innerHTML += '<a href="../View/EditProfile.html"><button class="editProfile">Edit Profile</button></a><br>';
    user.innerHTML += '<button class="deleteProfile" onclick="deletePopUp()">Delete Profile</button><br>';
}

function updatePw(rd){
    alert(rd.msg);
      if (rd.result == "1"){
        window.location = "LoggedView.html";
    }   
}


function updateDatas(rd){
     alert(rd.msg);
      if (rd.result == "1"){
        window.location = "LoggedView.html";
    }   
}

function dontupdateProfile(){
    window.location = "MyProfile.html";
}

function deleteAccount(rd){
    alert(rd.msg);
    if (rd.result == "1"){
        window.location = "MainPageView.html";
}
}

function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "getMyDatas") { getMyDatas(rd); }
            if(processName == "deleteAccount") { deleteAccount(rd); }
            if(processName == "updatePw") { updatePw(rd); }
            if(processName == "updateDatas") { updateDatas(rd); }
        },
        error:function(){
            alert("Hiba a(z) " + postFile + " hívásakor.");
        }
    });
}

function getMyProfile(){
    var data = {'task': 'getUser'};
    sendRecive("../Controller/AccountController.php", data, "getMyDatas");
    Clock();
}

function chngPw(){
   document.getElementById("changePwPopUp").style.display = "block";
   document.getElementById("deletePop").style.display = "none";
}

function cancelChngPW(){
    document.getElementById("changePwPopUp").style.display = "none";
    document.getElementById("pwMsg").style.display = "none";
}


function showpasswordMsg(){
    document.getElementById("pwMsg").style.display = "block";
}

function updateProfile(){
    var newUsername = document.getElementById("newUsername");
    var newEmail = document.getElementById("newEmail");
    var newFirstname = document.getElementById("newFirstname");
    var newSurename = document.getElementById("newSurename");
    var newBirthdate = document.getElementById("newBirthdate");
    var gender = document.getElementById("gender");
    if(gender.value == "Female"){
        var gender = "female";
    }
    else if(gender.value == "Male"){
        var gender = "male";
    }
     else if(gender.value == "Other"){
        var gender = "other";
    }
    var data = {'task':'updateProfile', 'newUsername' : newUsername.value.trim(), 'newEmail' : newEmail.value.trim(), 'newFirstname' : newFirstname.value.trim(), 'newSurename' : newSurename.value.trim(), 'newBirthdate' : newBirthdate.value.trim(), 'gender' : gender.value.trim()};
    if(newUsername.value.trim() !="" && newEmail.value.trim() !="" &&  newFirstname.value.trim() !="" && newSurename.value.trim() !="" && newBirthdate.value.trim() !="" && gender.value.trim() !=""){
        sendRecive("../Controller/AccountController.php", data, "updateDatas");
    }
    else{
        alert("Missing datas!");
    }
    
}

function changePw(){
    var oldPw = document.getElementById("oldpassword");
    var newPw = document.getElementById("newpassword");
    var newPw2 = document.getElementById("newpassword2");
    
    var data = {'task':'changePw', 'oldPw' : oldPw.value.trim(), 'newPw' : newPw.value.trim(), 'newPw2' : newPw2.value.trim()};
    if(oldPw.value.trim() != "" && newPw.value.trim() != "" && newPw2.value.trim() != "" ){
       sendRecive("../Controller/AccountController.php", data, "updatePw");
    }
    else{
        alert("Missing datas!");
    }
    
}

function deletePopUp(){
    document.getElementById("deletePop").style.display = "block";
    document.getElementById("changePwPopUp").style.display = "none";
    document.getElementById("pwMsg").style.display = "none";
    document.getElementById("editUsername").style.display = "none";
    document.getElementById("editEmail").style.display = "none";
    document.getElementById("editFirstname").style.display = "none";
    document.getElementById("editSurename").style.display = "none";
    document.getElementById("editBirthdate").style.display = "none";
    document.getElementById("editGender").style.display = "none";
    document.getElementById("editBtn").style.display = "none";
}

function dontDeleteProfile(){
     document.getElementById("deletePop").style.display = "none";
}

function deleteProfile(){
     var data = {'task': 'deleteUser'};
    sendRecive("../Controller/AccountController.php", data, "deleteAccount");
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
