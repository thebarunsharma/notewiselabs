

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

$usernam=$_SESSION['user_name'];
$query =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
$row=mysqli_fetch_array($query);
$ida=$row["id"];
$date = date('y-d-m');
$querys=mysqli_query($conn,"SELECT * FROM tag");
$rowz=mysqli_fetch_array($querys);
$tid=$rowz['id'];
if(isset($_POST['submit']))
{
    $title = addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    $tag=addslashes($_POST['tag']);
    $insertqry="INSERT INTO content( title,description,user_id,tag_name) VALUES ('$title', '$description','$ida','$tag')";
    $insertres=mysqli_query($conn,$insertqry);
   
}

?>
<?php?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
 <head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

  <title>Add Notes</title>
 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
 </head>
 <body>
 
 
 <div class="container-fluid">
        <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
        
        <form method="post" >
        <div class="modal-body">
          <div class="input-field">
                <label for="title"  >Enter title:</label><br>
                <input id="inpt" type="text" name="title" oninvalid="this.setCustomValidity('Note should have a title" oninput="this.setCustomValidity('')" required><br>
            </div><br>
          <div class="input-field">
            <label>Description</label>
            <div>
              <textarea class="form-control" name="description"  required id="editor1" required></textarea>
            </div>
          </div>
          <div><br>
          <label>Select Note Type</label>
            <div class="input-field">
              <select class="form-control"  name="tag" required>
                <option value="" >Select</option>
                <?php
                while($rows = mysqli_fetch_array($querys)){
                  $tag= $rows['tags'];
                  $tag2= $rows['id'];
                  echo"<option value =$tag2>$tag</option>";
                }
               ?>
               </div>
              </div>
              </select>
                 
            <div><br>
              <input type="submit" name="submit" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
   
          
 

<script>
  CKEDITOR.replace( 'editor1' );
</script>
 <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
<?php
}else{
  header('location: login.php');
}
?>
</div>



  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
 