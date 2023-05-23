<?php
    

    
    

    echo '<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
    <img height="30px" width="30px" class="rounded-circle" src="/forum/img/myForum_logo.jpg" alt="">
    <a class="navbar-brand" href="/forum"> myForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
            </a>
            <ul class="dropdown-menu">';


            $sql2="SELECT category_name,category_id FROM `categories` LIMIT 5";
            $result2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_assoc($result2)){

                echo '<li><a class="dropdown-item" href="http://localhost/forum/threadlist.php?catid='.$row2['category_id'].'">'. $row2['category_name'] .'</a></li>';
                
            }
            
    echo '</ul>
        </li>
       
        </ul>
        ';


        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
            echo '<form class="d-flex" role="search" action="search.php" method="get">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <span class="text-light my=0">welcome '. $_SESSION['username'] .'</span>
                <a href="partials/_logout.php" class="btn btn-outline-success mx-2" >Log Out</a>
            </form>';
        }
        else{
            echo '<form class="d-flex" role="search" action="search.php" method="get">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">LogIn</button>
                <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';

        }
        
echo '
    </div>
    </div>
</nav>
';

include "partials/_loginModal.php";
include "partials/_signupModal.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have successfully created your myForum account.<br>
            click here to <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">LogIn</button>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $_GET['error'] .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if(isset($_GET['login']) && $_GET['login']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have been successfully logged in
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
else if(isset($_GET['login']) && $_GET['login']=="false"){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid username or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

  ?>