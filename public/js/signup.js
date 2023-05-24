var username = document.getElementById("username");

username.addEventListener('input', function () {
    var username = document.getElementById("username").value;
    var usernameTakenAlert = document.getElementById("usernameTakenAlert");

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http://localhost/ITCS333-Project/controllers/ajax/checkUsernameEmail.inc.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var response = JSON.parse(ajax.responseText);
            if (response.isRegistered) {
                usernameTakenAlert.style.display = "block";
            } else {
                usernameTakenAlert.style.display = "none";
            }
        }
    };
    ajax.send("username=" + encodeURIComponent(username));
});


var email = document.getElementById("email");

email.addEventListener('input', function () {
    var email = document.getElementById("email").value;
    var emailTakenAlert = document.getElementById("emailTakenAlert");

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http://localhost/ITCS333-Project/controllers/ajax/checkUsernameEmail.inc.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var response = JSON.parse(ajax.responseText);
            if (response.isRegistered) {
                emailTakenAlert.style.display = "block";
            } else {
                emailTakenAlert.style.display = "none";
            }
        }
    };
    ajax.send("email=" + encodeURIComponent(email));
});
