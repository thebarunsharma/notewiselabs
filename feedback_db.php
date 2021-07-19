<?php
session_start();

    include "config.php";

    if($conn){

        $user = $_POST['user'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $comments = $_POST['comments'];

        mysqli_select_db($conn, 'nms');
        $query = "INSERT into feedback(user, email, mobile, comments) VALUES('$user','$email','$mobile','$comments')";
        mysqli_query($conn,$query);

        header('location: main.php');
    }
    else{
        echo"Connection Failed";
    }

    
  
?>