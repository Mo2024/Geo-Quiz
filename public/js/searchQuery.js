document.getElementById("searchButton").addEventListener("click", function () {
    var searchQuery = document.getElementById("searchQuery").value;
    window.location.href = "quizzesDisplay.php?searchQuery=" + encodeURIComponent(searchQuery);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "searchQuizzes.php?searchQuery=" + encodeURIComponent(searchQuery), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var quizzes = response.quizzes;
            var container = document.querySelector(".container");

            container.innerHTML = "";

            for (var i = 0; i < quizzes.length; i++) {
                var quiz = quizzes[i];
                var card = document.createElement("div");
                card.classList.add("card", "mb-3", "mt-3");
                card.innerHTML = `
            <div class="row">
              <div class="col-md-3">
                <img src="${quiz.image}" alt="" class="img-fluid h-100 w-100">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">${quiz.title}</h3>
                  <h4 class="card-title">Created By: ${quiz.username}</h4>
                  <br/>
                  <h5 class="card-title">Number of Questions: ${quiz.nQuestions}</h5>
                  <h5 class="card-title">Total Time: ${quiz.totalTime / 60} Minutes</h5>
                  <h5 class="card-title">Description:</h5>
                  <p class="card-text">${quiz.description}</p>
                  <a href="/ITCS333-Project/quiz/conductQuiz.php?quizId=${quiz.quizid}" class="btn btn-primary">Start Quiz</a>
                </div>
              </div>
            </div>
          `;
                container.appendChild(card);
            }
        }
    };
    xhr.send();
});
