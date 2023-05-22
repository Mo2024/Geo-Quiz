<?php $title = "My Quizzes"; require('../partials/boilerplate.inc.php')?>
<!-- <?php require('../controllers/profile/profile.inc.php')?> -->
<style>
thead
{
    background-color: #3C486B;
    color: white;
}
</style>
<br>
   <div class="mt-4 container">
   <table class="table table-bordered border border-dark text-center">
       <thead>
         <tr >
           <th  scope="col" colspan="3">Quizzes Created By: </th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <th>Quiz Title</th>
           <th>Date Created</th>
           <th>Quiz Edit</th>
         </tr>
         <tr>
           <td>Capital Cities</td>
           <td>March 08, 2023</td>
           <td><button type="button" class="btn btn-sm btn-outline-secondary">Edit Quiz</button></td>
         </tr>
       </tbody>
     </table>
     <div class="d-flex">
       <button type="button" class="btn btn-sm btn-outline-primary ms-auto">
        <a href="mainPage.php">Return To Home Page</a></button>
     </div>
   </div>

<?php require('../partials/footer.inc.php')?>
