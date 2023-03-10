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





    <!-- CAROUSEL------------------------------------------------------------------------------------------------------------------------------------ -->

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://picsum.photos/1600/300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://picsum.photos/1600/300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="https://picsum.photos/1600/300" class="d-block w-100" alt="...">
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








        <div class="container my-3 shift">
                <h4 class="text-center">About</h4>
                <br><br>
                <p>An online forum is a great place to discuss any particular topic with the like-minded people. These forums are internet-based group communities where you can start a discussion, or get an answer of your query or even search for new business prospects. These forums allow you to register with them and after that you can look into the answers to various questions written by others or you yourself can answer the questions. Almost every website these days has a small forum integrated in their own websites.</p>

                <p> An online forum, or a message board, is a public place where you can drop any message, or discuss about any particular topic. In this article, we are going to discuss more about the public forums which are quite common and high in popularity.</p>



        </div>
        






    <!-- FOOTER--------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


   <?php
      include "partials/_footer.php";
   ?>





        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>