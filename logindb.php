<?php
session_start();
include "config.php";
if (isset($_POST['login_user'])) {
if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: login.php?error=Username is required");
        exit();
    }else if(empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        // hashing the password
        $pass = md5($pass);


        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $role= "SELECT role FROM users WHERE user_name='$username' AND password='$password'";
            $roles =mysqli_query($conn,$role);
            $row = mysqli_fetch_assoc($result);
              }
            if ($row['user_name'] === $uname && $row['password'] === $pass AND ($row['role'] == "admin") ) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['admin'] = $row['role'];
                header("location: index.php");
                exit();
            }
            if ($row['user_name'] === $uname && $row['password'] === $pass AND ($row['role'] == "user") ) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("location: user/index.php");
                exit();
            }
            if ($row['user_name'] === $uname && $row['password'] === $pass AND ($row['role'] == "author") ) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("location: author/index.php");
                exit();
            }
        else{
                header("Location: login.php?error=Incorect Username or Password");
                exit();
    }

}
}
}