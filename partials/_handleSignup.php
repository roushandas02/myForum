<?php
       $showAlert=false;
       $showError="false";
       if($_SERVER['REQUEST_METHOD']=='POST'){
            include '_dbconnect.php';
            $username=$_POST['username'];
            $email=$_POST['email'];
            $number=$_POST['number'];
            $pass=$_POST['password'];
            $cpass=$_POST['cpassword'];

            //Checking if user already exists
            $existSql="select * from `users` where user_name='. $username .'";
            $result=mysqli_query($conn,$existSql);
            $numRows=mysqli_num_rows($result);
            if($numRows>0){
                $showError="User already exist";
            }
            else{
                if($pass==$cpass){
                    $hash=password_hash($pass, PASSWORD_DEFAULT);
                    $sql="INSERT INTO `users` (`user_name`,`user_email`,`user_number`,`user_password`,`timestamp`) VALUES ('$username','$email','$number','$hash',current_timestamp())";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        $showAlert=true;
                        header("Location:/forum/index.php?signupsuccess=true");
                        exit();
                    }
                }
                else{
                    $showError="Passwords do not match";
                    
                }
            }
            header("Location:/forum/index.php?signupsuccess=false&error=$showError");

       
        $sql="INSERT INTO `comments` (`comment_content`,`thread_id`, `comment_by`,`comment_time`) VALUES ('$comm', '$id', '0',current_timestamp())";
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
