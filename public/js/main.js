//Checks every 5 seconds if cookie exist and destroys sessions if not exist
setInterval(checkCookie, 5000);
function checkCookie() {
    let cookiesObject = document.cookie
        .split(";")
        .map(cookie => cookie.split('='))
        .reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {});

    if (typeof cookiesObject.session === 'undefined') {
        const url = "http://localhost/ITCS333-Project/controllers/auth/signout.inc.php";
        const options = {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json;charset=UTF-8",
            },
        };
        fetch(url, options)
    }


}