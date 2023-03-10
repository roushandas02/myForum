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








        <div class="container my-5 shift">
            <h5 class="text-center">Contact Us</h5>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="contact_fname" class="form-label">First name*</label>
                    <input type="text" class="form-control" id="contact_fname" name="contact_fname" required>
                </div>
                <div class="col-md-6">
                    <label for="contact_lname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="contact_lname" name="contact_lname">
                </div>
                
                <div class="col-md-12">
                    <label for="contact_email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="contact_email" name="contact_email">
                </div>
                <!-- <div class="col-md-6"></div> -->
                <div class="col-md-6">
                    <label for="contact_number"  class="form-label">Mobile*</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>
                <div class="col-md-6"></div>
                
                
                <div class="col-md-6">
                    <label for="contact_city" class="form-label">City</label>
                    <input type="text" class="form-control" id="contact_city" name="contact_city">
                </div>
                <div class="col-md-6">
                    <label for="contact_state" class="form-label">State</label>
                    <select id="contact_state" class="form-select" name="contact_state" >
                    <option selected>Choose...</option>
                    <option>Andhra Pradesh</option>
                    <option>Arunachal Pradesh</option>
                    <option>Assam</option>
                    <option>Bihar</option>
                    <option>Chhattisgarh</option>
                    <option>Goa</option>
                    <option>Gujarat</option>
                    <option>Haryana</option>
                    <option>Himachal Pradesh</option>
                    <option>Jharkhand</option>
                    <option>Karnataka</option>
                    <option>Kerala</option>
                    <option>Madhya Pradesh</option>
                    <option>Maharashtra</option>
                    <option>Manipur</option>
                    <option>Meghalaya</option>
                    <option>Mizoram</option>
                    <option>Nagaland</option>
                    <option>Odisha</option>
                    <option>Punjab</option>
                    <option>Rajasthan</option>
                    <option>Sikkim</option>
                    <option>Tamil Nadu</option>
                    <option>Telangana</option>
                    <option>Tripura</option>
                    <option>Uttar Pradesh</option>
                    <option>Uttarakhand</option>
                    <option>West Bengal</option>
                    
                    </select>
                </div>
                
                
                <div class="col-12">
                    <button type="submit" class="btn btn-success ">Submit</button>
                </div>
            </form>
        </div>
        







    <!-- FOOTER--------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


   <?php
      include "partials/_footer.php";
   ?>





        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>