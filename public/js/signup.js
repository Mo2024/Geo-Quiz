var username = document.getElementById("username");

username.addEventListener('input', function () {
    var username = document.getElementById("username").value;
    var usernameTakenAlert = document.getElementById("usernameTakenAlert");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ITCS333-Project/controllers/ajax/checkUsernameEmail.inc.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.isRegistered) {
                usernameTakenAlert.style.display = "block";
            } else {
                usernameTakenAlert.style.display = "none";
            }
        }
    };
    xhr.send("username=" + encodeURIComponent(username));
});


var email = document.getElementById("email");

email.addEventListener('input', function () {
    var email = document.getElementById("email").value;
    var emailTakenAlert = document.getElementById("emailTakenAlert");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ITCS333-Project/controllers/ajax/checkUsernameEmail.inc.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.isRegistered) {
                emailTakenAlert.style.display = "block";
            } else {
                emailTakenAlert.style.display = "none";
            }
        }
    };
    xhr.send("email=" + encodeURIComponent(email));
});
