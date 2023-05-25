var countdownInterval;
var remainingTimeInSeconds;
var totalTimeInSeconds;
var paused = false;

document.addEventListener('DOMContentLoaded', function () {
    // Your code here
    var inputBoxes = document.querySelectorAll('input[name="answers[]"]');
    inputBoxes.forEach(function (inputBox, index) {
        var qId = inputBox.getAttribute('q-id');
        var answerObject = {
            answer: 'undefined',
            questionId: qId
        };
        inputBoxes[index].value = JSON.stringify(answerObject);
    });
    startTimer();
});

function formatTime(time) {
    var hours = Math.floor(time / 3600);
    var minutes = Math.floor((time % 3600) / 60);
    var seconds = time % 60;

    var formattedTime = hours.toString().padStart(2, '0') + ':' +
        minutes.toString().padStart(2, '0') + ':' +
        seconds.toString().padStart(2, '0');

    return formattedTime;
}

function startTimer(time) {
    var timerInput = totalQuizTime;
    var minutes = parseInt(timerInput);
    remainingTimeInSeconds = minutes * 60;
    totalTimeInSeconds = remainingTimeInSeconds;

    var timerBox = document.getElementById("timerBox");
    var remainingTimeElement = document.getElementById("remainingTime");
    var startButton = document.getElementById("startButton");
    var pauseButton = document.getElementById("pauseButton");

    if (isNaN(minutes) || minutes <= 0) {
        alert("Please enter a valid timer value in minutes!");
        timerBox.textContent = "";
        timerInput.value = "";
        return;
    }

    var remainingPercentage = (remainingTimeInSeconds / totalTimeInSeconds) * 100;
    timerBox.style.width = remainingPercentage + "%";
    remainingTimeElement.textContent = formatTime(remainingTimeInSeconds);

    clearInterval(countdownInterval);
    countdownInterval = setInterval(function () {
        if (!paused) {
            remainingTimeInSeconds--;
            remainingPercentage = (remainingTimeInSeconds / totalTimeInSeconds) * 100;

            timerBox.style.width = remainingPercentage + "%";
            remainingTimeElement.textContent = formatTime(remainingTimeInSeconds);

            document.getElementById('timeLeft').value = remainingTimeInSeconds;
            if (remainingTimeInSeconds <= 0) {
                submitForm()
                clearInterval(countdownInterval);
                startButton.disabled = false;
                pauseButton.disabled = true;
            } else if (remainingPercentage <= 10) {
                timerBox.style.backgroundColor = "red";
            } else if (remainingPercentage <= 50) {
                timerBox.style.backgroundColor = "orange";
            } else {
                timerBox.style.backgroundColor = "Green";
            }

        }
    }, 1000);

    startButton.disabled = true;
    pauseButton.disabled = false;
}

function pauseTimer() {
    paused = !paused;
    var form = document.getElementById('quizForm');
    var pauseButton = document.getElementById("pauseButton");
    if (paused) {
        pauseButton.textContent = "Resume";

        var inputElements = form.querySelectorAll('input');
        inputElements.forEach(function (element) {
            element.disabled = true;
        });
        var submitButton = form.getElementById('submitBtn');
        submitButton.disabled = true;
    } else {
        pauseButton.textContent = "Pause";

        var inputElements = form.querySelectorAll('input');
        inputElements.forEach(function (element) {
            element.disabled = false;
        });
        var submitButton = form.querySelector('button[name="submit"]');
        submitButton.disabled = false;
    }
}

function handleRadioClick(value, id, questionId) {
    var inputBoxes = document.getElementsByName("answers[]");
    console.log(questionId)
    let questionIdSplit = questionId.split('q');
    questionId = questionIdSplit[1]
    var answerObject = {
        answer: value,
        questionId: questionId
    };
    inputBoxes[id].value = JSON.stringify(answerObject);
}

function submitForm() {
    var answerBoxes = document.getElementsByName("answers[]");
    let timeleftinput = document.getElementById("timeLeft")
    for (i = 0; i < answerBoxes.length; i++) {
        answerBoxes[i].style.display = 'block';
    }
    timeleftinput.style.display = 'block';
    let textInputBox = document.querySelectorAll('[answer-id]');
    for (i = 0; i < textInputBox.length; i++) {
        let id = textInputBox[i].getAttribute('answer-id')
        let questionId = textInputBox[i].name
        console.log(questionId)
        if (textInputBox[i].type == "text") {
            handleRadioClick(textInputBox[i].value, id, questionId)
        } else if (textInputBox[i].type == "radio" && textInputBox[i].checked) {
            let id = textInputBox[i].name
            handleRadioClick(textInputBox[i].value, id, questionId)
        }
    }

    var submitBtn = document.getElementById('submitBtn');
    submitBtn.type = 'submit';
    submitBtn.click();

}