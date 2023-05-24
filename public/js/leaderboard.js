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

        for (var i = 0; i < leaderboard.length; i++) {
            if (typeof leaderboard[i] === 'undefined') {
                break;
            } else {
                if (i == 1) {
                    usernameElemnt[1].innerHTML = leaderboard[1].username
                    pointsElemnt[1].innerHTML = "Points: " + leaderboard[1].score
                } else if (i == 0) {
                    usernameElemnt[0].innerHTML = leaderboard[0].username
                    pointsElemnt[0].innerHTML = "Points: " + leaderboard[0].score
                } else if (i == 2) {
                    usernameElemnt[2].innerHTML = leaderboard[2].username
                    pointsElemnt[2].innerHTML = "Points: " + leaderboard[2].score
                } else {
                    usernameElemnt[i].innerHTML = leaderboard[i].username + "<br>" + leaderboard[i].score
                }
            }

            var entry = leaderboard[i];
            var username = entry.username;
            var score = entry.score;
            var timeElapsed = entry.timeElapsed;

            console.log('Username:', username);
            console.log('Score:', score);
            console.log('Time Elapsed:', timeElapsed);
        }
    } else {
        console.log('Request failed. Status:', ajax.status);
    }
};

ajax.send();
