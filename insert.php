<?php
  include "config.php";
 $names="";

//write the query to get data from users table

$sql = "SELECT * FROM content";

//execute the query

$result = $conn->query($sql);

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && $_SESSION['admin'] == true){



  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_name']);
    header('location: login.php');
  }

?>
<?php
//insert.php

$usernam=$_SESSION['user_name'];
$query1 =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
$row=mysqli_fetch_array($query1);
$ida=$row["id"];
$date = date('y-d-m');
if(isset($_POST["title"]))
{
     $title = addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    $insertqry="INSERT INTO content( title,description,user_id,date) VALUES ('$title', '$description','$ida','$date')";
    $insertres=mysqli_query($conn,$insertqry);
 $connect = new PDO("mysql:host=localhost;dbname=nms", "root", "");
 $query = "INSERT INTO tag(tags,user_id) VALUES(:tags,$ida)";
 $statement = $connect->prepare($query);
 $statement->execute(
  
 );
 $result = $statement->fetchAll();
 $output = '';
 if(isset($result))
 {
  $output = '
  <div class="alert alert-success">
   Your data has been successfully saved into System
  </div>
  ';
 }
 echo $output;

 
}

?>
<?php
}else{
  header('location: login.php');
}
?>