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
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <!-- <meta charset="UTF-16LE"> -->
  <title>Notes </title>
  
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<body>



<?php
 
 $query=mysqli_query($conn,"SELECT * FROM feedback");
 $rowcount = mysqli_num_rows($query);
 ?><br>
 <div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Feedbacks   
    </h6>
  </div>
 
 <table  class="table table-bordered">
    <tr>
    <thead class="thead-dark">
   
    <th>ID</th>
    <th>Names</th>
    <th>Number</th>
    <th>Email</th>
    <th>Suggestion</th>
</tr>
 <?php
 for($i=1;$i<=$rowcount;$i++)
 {
    $row=mysqli_fetch_array($query);
?>
<tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['user']; ?></td>
      <td><?php echo $row['mobile']; ?></p></td>
      <td><?php echo $row['email']; ?></td>
     <td><?php echo substr($row['comments'],0,56); ?>.......</td> 
 </tr>  
 
    <?php
      }
    ?>
          
    
<form method="post">
  <div id="toolbar-container"></div>

    <!-- This container will become the editable. -->
    <div id="editor" name="editor" >
        <!-- <p>This is the initial editor content.</p> -->
    </div>
</form>
</div><br></div>


<?php
}else{
  header('location: login.php');
}
?>
  <?php
include('includes/scripts.php');
include('includes/footer.php');

?>