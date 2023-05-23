<?php
   include "partials/_dbconnect.php";
   ?>
   <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/forum/img/myForum_logo.jpg" />
    <title>  myForum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <style>
        .shift{
            min-height: 50vh;
        }
    </style>

  </head>
  <body>
    


  <!-- NAVBAR---------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



   <?php
    //   include "partials/_dbconnect.php";
      include "partials/_header.php";

   ?>
   




    <!-- CAROUSEL------------------------------------------------------------------------------------------------------------------------------------ -->

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://picsum.photos/1600/400" height="300px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://picsum.photos/1600/400" height="300px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://picsum.photos/1600/400" height="300px" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>




    <div class="container shift">
        <h2 class="text-center my-3">myForum - Browse Categories</h2>
        <div class="row">

        <?php
            $sql="SELECT * FROM `categories`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $cat_id=$row['category_id'];
                $cat_name=$row['category_name'];
                $cat_desc=$row['category_description'];
                echo '<div class="col-md-4 col-12 d-flex justify-content-evenly my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/200x200?'.$cat_name.'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='. $cat_id .'">' .$cat_name. '</a></h5>
                        <p class="card-text">'.substr($cat_desc,0,100).' </p>
                        <a href="threadlist.php?catid='. $cat_id .'" class="btn btn-primary d-flex justify-content-evenly">view threads</a>
                    </div>
                </div>
                </div>';
            }
            ?>
            


        </div>
        <br>
        <hr>
        <h2 class="text-center my-3">myForum - Add a new topic</h2>
        <div class="row">
        <?php

if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){

   echo    '<div class="container">
   <!-- THIS ACTION SUBMITS POST REQUEST TO SAME PAGE -->
   <div class="container">
 <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">
   <div class="mb-3">
     <label for="title" class="form-label">Title</label>
     <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
     <div id="titlehelp" class="form-text">keep your title brief</div>
   </div>
   <div class="form-floating">
      <div>Description</div>
      <br>
     <textarea class="form-control" name="description" id="description"></textarea>
     <!-- <input type="hidden" name="sno" value="'.$_SESSION["sno"].'"> -->
   </div>
   <br>
   <button type="submit" class="btn btn-primary">Add Topic</button>
 </form>
 </div>
 </div>
';

}
else{
    echo '<p class="lead text-center">You are not logged in. Please login to add a new topic.</p>';
}
?>


<!-- INSERTING THE NEW TOPIC DETAILS IN THE DATABASE -->
<?php
       $showAlert=false;
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $desc=$_POST['description'];
        $title=$_POST["title"];

        // SAVING FROM XSS ATTACK
        // $comm=str_replace("<","&lt;",$comm);
        // $comm=str_replace(">","&gt;",$comm);
       
        $sql="INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES (NULL, '$title', '$desc', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
           echo '<br><div class="alert my-3 alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> New Category was added. 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
       }
    ?>
        </div>
    </div>









    <!-- FOOTER--------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


   <?php
      include "partials/_footer.php";
   ?>





        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>