function getMyDatas(rd){
    var user = document.getElementById("profilContainer");
    user.innerHTML = "";
    user.innerHTML += '<div class="userData" id="user_' + rd.id + '" ><div class="username">' + rd.username + '</div><div class="email">' + rd.email + '</div><div class="firstname">' + rd.firstname + '</div><div class="surename">' + rd.surename + '</div><div class="birthdate">' + rd.birthdate + '</div><div class="gender">' + rd.gender + '</div><div><button onclick="editProfile(\'' + rd.id + '\')">Click!</button></div><div></div></div>';
}

function editProfile(id){
    var user = document.getElementById("user_" + id);
    user.innerHTML += '<div class="szerkesztes" id="szerk_' + id + '">';
    user.innerHTML += '<input type="text" id="username" value="' + user.getElementsByClassName("username")[0].innerHTML + '"><br>';
    user.innerHTML += '<input type="text" id="email" value="' + user.getElementsByClassName("email")[0].innerHTML + '"><br>';
    user.innerHTML += '<input type="text" id="firstname" value="' + user.getElementsByClassName("firstname")[0].innerHTML + '"><br>';
    user.innerHTML += '<input type="text" id="surename" value="' + user.getElementsByClassName("surename")[0].innerHTML + '"><br>';
    user.innerHTML += '<input type="date" id="birthdate" value="' + user.getElementsByClassName("birthdate")[0].innerHTML + '"><br>';
    user.innerHTML += '<input type="text" id="gender" value="' + user.getElementsByClassName("gender")[0].innerHTML + '"><br>';
    //user.innerHTML += '<select id="gender"><option value="Female">Female</option><option value="Male">Male</option><option value="Other">Other</option></select><br>';
    user.innerHTML += '<button onclick="updateProfile(\'' + id + '\')">Edit</button><br>';
    user.innerHTML += '<button onclick="cancel(\'' + id + '\')">Cancel</button><br>';
    user.innerHTML += '</div>';
}

function updateDatas(rd){
    alert(rd.msg);
    if(rd.result == "1"){
        window.location = "LoggedView.html";
    }
}

function cancel(id){
    window.location = "MyProfile.html";
}

function sendRecive(postFile, dataInput, processName){
    $.ajax({
        url:postFile,
        type:"post",
        data: dataInput,
        success:function(rd){
            if(processName == "getMyDatas") { getMyDatas(rd); }
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

function updateProfile(id){
    var newUsername = document.getElementById("username");
    var newEmail = document.getElementById("email");
    var newFirstname = document.getElementById("firstname");
    var newSurename = document.getElementById("surename");
    var newBirthdate = document.getElementById("birthdate");
    var gender = document.getElementById("gender");
    /*if(gender.value == "Female"){
        var sex = "female";
    }
    else if(gender.value == "Male"){
        var sex = "male";
    }
     else if(gender.value == "Other"){
        var sex = "other";
    }*/
    var data = {'task':'updateProfile', 'id': id, 'newUsername' : newUsername.value.trim(), 'newEmail' : newEmail.value.trim(), 'newFirstname' : newFirstname.value.trim(), 'newSurename' : newSurename.value.trim(), 'newBirthdate' : newBirthdate.value.trim(), 'gender' : gender.value.trim()};
    if(newUsername.value.trim() !="" && newEmail.value.trim() !="" &&  newFirstname.value.trim() !="" && newSurename.value.trim() !="" && newBirthdate.value.trim() !="" && gender.value.trim() !=""){
        sendRecive("../Controller/AccountController.php", data, "updateDatas");
    }
    else{
        alert("Missing datas!");
    }   
}



