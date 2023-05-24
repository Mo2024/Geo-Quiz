document.getElementById("searchButton").addEventListener("click", function () {
  var searchQuery = document.getElementById("searchQuery").value;
  if (searchQuery == '' || searchQuery == ' ') {
    searchQuery = 'all'
  }
  var now = new Date();
  var time = now.getTime();
  time += 300000; // 5 minutes in milliseconds
  now.setTime(time);

  document.cookie = "search=cookieValue; expires=" + now.toUTCString() + "; path=/";

  var ajax = new XMLHttpRequest();
  ajax.open("GET", "http://localhost/ITCS333-Project/controllers/ajax/searchQuizzes.inc.php?searchQuery=" + encodeURIComponent(searchQuery), true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState === 4 && ajax.status === 200) {
      var response = JSON.parse(ajax.responseText);
      var quizzes = response.quizzes;
      var container = document.getElementById("mainContainer");

      container.innerHTML = "";

      quizzes.forEach(function (quiz) {
        var card = document.createElement("div");
        card.classList.add("card", "mb-3", "mt-3");
        card.innerHTML = `
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://cdn.shopify.com/s/files/1/0566/6586/6400/products/6_6e504cd6-25a9-46b2-b94b-5d87768d3306_300x@2x.jpg?v=1629388839" alt="" class="img-fluid h-100 w-100">
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
      });
    }
  };
  ajax.send();
  document.cookie = "search=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

});
