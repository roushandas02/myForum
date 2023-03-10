<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myForum</title>
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
      include "partials/_dbconnect.php";
      include "partials/_header.php";

   ?>
   
   



    <!-- DISPLAY SEARCH RESULT-------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="container my-3 shift">
        <h4>Displaying search results for <em> "<?php echo $_GET['search'] ?>"</em></h4>


        <?php
        $noResults=true;
            $query=$_GET["search"];
            $sql="SELECT * FROM `threads` WHERE match (thread_title, thread_desc) against ('$query')";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $noResults=false;
                    $title=$row['thread_title'];
                    $desc=$row['thread_desc'];
                    $thread_id=$row['thread_id'];
                    $url="thread.php?threadid=". $thread_id;
                    
                    // DISPLAYING RESULTS
                    echo '<div class="result">
                    <br><br> <h5><a href="'. $url .'">'. $title .'</a></h5>
                                <p>'. $desc .'</p>
                        </div>';
                    
            }
            if($noResults){
                echo '<br><br> <div class="container">
                <p class="lead text-center">No search results found.</p>
                <p class="lead">Suggestions:</p><br>
                <ul>
                    <li>Make sure that all the words are spelled correctly</li>
                    <li>Try different Keywords</li>
                    <li>Try more general keywords</li>
                </ul>
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