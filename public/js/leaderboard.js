var urlParams = new URLSearchParams(window.location.search);
var quizId = urlParams.get('quizId');

var ajax = new XMLHttpRequest();
ajax.open('GET', "http://localhost/ITCS333-Project/controllers/ajax/quizLeaderboard.inc.php?quizId=" + quizId, true);
ajax.setRequestHeader('Content-Type', 'application/json');

ajax.onload = function () {
    if (ajax.status === 200) {
        var response = JSON.parse(ajax.responseText);

        var leaderboard = response.leaderboard;
        document.getElementById('mainDiv');
        let usernameElemnt = document.getElementsByClassName('username')
        let pointsElemnt = document.getElementsByClassName('points')

        for (var i = 0; i < 10; i++) {
            if (typeof leaderboard[i] === 'undefined') {
                break;
            } else {
                if (i < 3) {
                    usernameElemnt[i].innerHTML = leaderboard[0].username
                    pointsElemnt[i].innerHTML = "Points: " + leaderboard[0].score
                } else {
                    usernameElemnt[i].innerHTML = leaderboard[i].username + "<br>" + leaderboard[i].score
                }
            }
        }
        if (!(typeof leaderboard[0] === 'undefined')) {
            usernameElemnt[1].innerHTML = leaderboard[0].username
            pointsElemnt[1].innerHTML = "Points: " + leaderboard[0].score

            if (!(typeof leaderboard[1] === 'undefined')) {
                usernameElemnt[0].innerHTML = leaderboard[1].username
                pointsElemnt[0].innerHTML = "Points: " + leaderboard[1].score
            } else {
                usernameElemnt[0].innerHTML = "Username2"
                pointsElemnt[0].innerHTML = "Points: #"
            }
        }
    } else {
        console.log('Request failed. Status:', ajax.status);
    }
};

ajax.send();
