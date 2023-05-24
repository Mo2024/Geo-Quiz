document.getElementById("signupButton").addEventListener("click", function () {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ITCS333-Project/controllers/ajax/checkUsernameEmail.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.isRegistered) {
                alert(response.message);
            } else {
                button.type = "submit";
                button.click();
            }
        }
    };
    xhr.send("username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email));
});
