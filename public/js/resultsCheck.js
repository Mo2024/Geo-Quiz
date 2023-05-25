var ajax = new XMLHttpRequest();
ajax.open('GET', "http://localhost/ITCS333-Project/controllers/ajax/quizLeaderboard.inc.php?quizId=" + quizId, true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.onload = function () {
    if (ajax.status === 200) {
        var response = JSON.parse(ajax.responseText);

        var leaderboard = response.leaderboard;
        let rankDiv = document.getElementById('rankDiv');

        console.log(leaderboard)
        for (var i = 0; i < leaderboard.length; i++) {
            if (leaderboard[i].username == usernameSession) {
                rankDiv.innerHTML = `${i + 1}${getPlaceSuffix(i + 1)} place`;
            }
        }

    } else {
        console.log('Request failed. Status:', ajax.status);
    }
};

ajax.send();

function getPlaceSuffix(place) {
    if (place === 1) {
        return 'st';
    } else if (place === 2) {
        return 'nd';
    } else if (place === 3) {
        return 'rd';
    } else {
        return 'th';
    }
}
