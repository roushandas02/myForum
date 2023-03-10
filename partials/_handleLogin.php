<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';
        $username=$_POST["loginUsername"];
        $pass=$_POST["loginPassword"];
        $sql="Select * from users where user_name='$username'";
        $result=mysqli_query($conn,$sql);
        $numRows=mysqli_num_rows($result);
        
        if($numRows==1){
            
            while($row=mysqli_fetch_assoc($result)){
            if(password_verify($pass,$row['user_password'])){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sno']=$row['sno'];
                $_SESSION['username']=$username;
                header("Location: /forum/index.php?login=true");
               
            }
            else{
                header("Location: /forum/index.php?login=false");
            }
        }
        }
        else{
            header("Location: /forum/index.php?login=false");
        }
    }
?>



