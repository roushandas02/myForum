<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myForum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  </head>
  <body>
    


  <!-- NAVBAR---------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



   <?php
   include "partials/_dbconnect.php";
      include "partials/_header.php";
      

   ?>
   <?php
       $id=$_GET['threadid'];
       $sql="SELECT * FROM `threads` WHERE thread_id=$id";
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result)){
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_user_id=$row['thread_user_id'];
            $sql2="SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);
              $posted_by=$row2['user_name'];
            
       }
    ?>



    <?php
       $showAlert=false;
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $comm=$_POST['comment'];
        $sno=$_POST["sno"];

        // SAVING FROM XSS ATTACK
        $comm=str_replace("<","&lt;",$comm);
        $comm=str_replace(">","&gt;",$comm);
       
        $sql="INSERT INTO `comments` (`comment_content`,`thread_id`, `comment_by`,`comment_time`) VALUES ('$comm', '$id', '$sno',current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
           echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your comment was posted
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
       }
    ?>





      <div class="container">
        <div class="h-100 p-5 text-bg-dark rounded-3">
          <h2><?php echo $title ?></h2>
          <p><?php echo $desc ?></p>
          <hr>
          <br>
          <p ><b><em> Posted by: <?php echo $posted_by; ?> </em></b></p>
        </div>
      </div>





      <div class="container" id="ele">
      <h2 class="text-center my-5">Post a Comment</h2>




      <?php

if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){

   echo    '<div class="container">
   <!-- THIS ACTION SUBMITS POST REQUEST TO SAME PAGE -->
 <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">
   <!-- <div class="mb-3">
     <label for="title" class="form-label">Title</label>
     <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
     <div id="titlehelp" class="form-text">keep your title brief</div>
   </div> -->
   <div class="form-floating">
      <div>Comment</div>
      <br>
     <textarea class="form-control" name="comment" id="comment"></textarea>
     <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
   </div>
   <br>
   <button type="submit" class="btn btn-primary">Post Comment</button>
 </form>
 </div>
';

}
else{
    echo '<p class="lead text-center">You are not logged in. Please login to add comments.</p>';
}
?>








      





      <h2 class="text-center my-5">Discussions</h2>



      <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM `comments` WHERE thread_id=$id";
        $result=mysqli_query($conn,$sql);
        $noResult=true;
        while($row=mysqli_fetch_assoc($result)){
            
              $content=$row['comment_content'];
              $id=$row['comment_id'];
              $comment_time=$row['comment_time'];
              $noResult=false;
              $comment_by=$row['comment_by'];
              $sql2="SELECT user_name FROM `users` WHERE sno='$comment_by'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);


              echo '<div class="container my-3">
              <div class="card">
                <div class="card-header">
                <span class="text-left "><b><i class="fas fa-user-circle"></i> '. $row2['user_name'] .' </b></span>
                <span class="text-right mx-2"> at '. $comment_time .'</span>
                </div>
                
                <div class="card-body">
                   <!--<h5 class="card-title"><a href="thread.php">'. $title .'</a></h5>-->
                  <p class="card-text">'. $content .'</p>
                   <!--<a href="thread.php" class="btn btn-primary">Answer</a>-->
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