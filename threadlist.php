<?php
   include "partials/_dbconnect.php";
   ?>
   <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myForum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- <style>
      .ele{
         height: 450px;
      }
    </style> -->
  </head>
  <body>
    


  <!-- NAVBAR---------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



   <?php
  //  include "partials/_dbconnect.php";
      include "partials/_header.php";
      

   ?>
   <?php
       
       $id=$_GET['catid'];
       $sql="SELECT * FROM `categories` WHERE category_id=$id";
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result)){
            $cat_name=$row['category_name'];
            $cat_desc=$row['category_description'];
       }
    ?>
    <?php
       $showAlert=false;
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];

        // SAVING FROM XSS ATTACK
        $th_title=str_replace("<","&lt;",$th_title);
        $th_title=str_replace(">","&gt;",$th_title);

        $th_desc=str_replace("<","&lt;",$th_desc);
        $th_desc=str_replace(">","&gt;",$th_desc);


        $sno=$_POST["sno"];

        $sql="INSERT INTO `threads` (`thread_title`,`thread_desc`, `thread_cat_id`,`thread_user_id`,`timestamp`) VALUES ('$th_title', '$th_desc', '$id','$sno',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your question was posted
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
       }
    ?>





      <div class="container">
        <div class="h-100 p-5 text-bg-dark rounded-3">
          <h2>Welcome to <?php echo $cat_name?> forums</h2>
          <p><?php echo $cat_desc?></p>
          <button class="btn btn-outline-success" type="button">Know more</button>
        </div>
      </div>

      <div class="container" id="ele">
      <h2 class="text-center my-5">Start a Discussion</h2>




      <?php

if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){

   echo    '<div class="container">
        <!-- THIS ACTION SUBMITS POST REQUEST TO SAME PAGE -->
      <form action="'.$_SERVER['REQUEST_URI'],'" method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
          <div id="titlehelp" class="form-text">keep your title brief</div>
        </div>
        <div class="form-floating">
           <div>Description</div>
           <br>
          <textarea class="form-control" name="desc" id="desc"></textarea>
          <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>';

}
else{
    echo '<p class="lead text-center">You are not logged in. Please login to start discussion.</p>';
}
?>



      <h2 class="text-center my-5">myForum - Browse Questions</h2>
      <?php
        $id=$_GET['catid'];
        $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result=mysqli_query($conn,$sql);
        $noResult=true;
        while($row=mysqli_fetch_assoc($result)){
              $noResult=false;
              $title=$row['thread_title'];
              $desc=$row['thread_desc'];
              $id=$row['thread_id'];
              $comment_time=$row['timestamp'];
              $thread_user_id=$row['thread_user_id'];
              $sql2="SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);


              echo '<div class="container my-3">
              <div class="card">
              <div class="card-header">
              <span class="text-left "><b><i class="fas fa-user-circle"></i> '. $row2['user_name'] .' </b></span>
              <span class="text-right mx-2"> at '. $comment_time .'</span>
              </div>
                
                <div class="card-body">
                  <h5 class="card-title"><a href="thread.php?threadid='. $id .'">'. $title .'</a></h5>
                  <p class="card-text">'. $desc .'</p>
                  <a href="thread.php?threadid='. $id .'" class="btn btn-primary">Answer</a>
                </div>
              </div>
           </div>';
        }
        if($noResult){
          echo '<div class="alert alert-dark" role="alert">
              <b>No Results Found</b>
              <br><br>
              Be the first one to ask a question
            </div>';
        }
      ?>
  </div>


       
      



    






    <!-- FOOTER--------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


   <?php
      include "partials/_footer.php";
   ?>





        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>