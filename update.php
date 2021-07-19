<?php
  include "config.php";
 $names="";

//write the query to get data from users table

$sql = "SELECT * FROM content";

//execute the query

$result = $conn->query($sql);

  session_start();

  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {



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
 <head>
     <link rel="icon" href="images/logo.svg">
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



<?php
    if (isset($_POST['update'])) {
        $names = $_POST['name'];
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $number =$_POST['number'];
        $role =$_POST['role'];
        // $password=$_POST['password'];



        $sql = " UPDATE `users` SET  `name`='$names',`user_name`='$username',`email`='$email',`number`='$number',`role`='$role'  WHERE `id`='$id'";
        $result = $conn->query($sql);

        if ($result == TRUE) {
          ?> <hr><?php
            echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }


if (isset($_GET['id'])) {
    $bid = $_GET['id'];


    $sql = "SELECT * FROM `users` WHERE `id`='$bid'";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $names = $row['name'];
            $username = $row['user_name'];
            $email = $row ['email'];
            $number = $row['number'];
            $id = $row['id'];
            $role = $row['role'];
            // $pass = $row['password'];
        }

    ?><br>
<div class="container-fluid">
        <h2>User Update Form</h2>
        <form action="" method="post">
            <label class="col-sm-2 col-form-label">Username:</label>
            <input type="text" id="inpt" name="username" data-theme="dark" value="<?php echo $username; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br><br>
            <label class="col-sm-2 col-form-label">Name:</label>
            <input type="text" id="inpt" name="name" value="<?php echo $names; ?>">
            <br><br>
            <label class="col-sm-2 col-form-label">Email:</label>
          
            <input type="email" id="inpt" name="email" value="<?php echo $email; ?>">
            <br><br>
            <label class="col-sm-2 col-form-label">Number:</label>
            
            <input type="number" id="inpt" name="number"   value="<?php echo $number; ?>">
            <br><br>
            <label class="col-sm-2 col-form-label">Current Role:</label>
            <input type="text" id="inpt" readonly name="role" value="<?php echo $role; ?>"><br><br>
            <label class="col-sm-2 col-form-label">Assign New Role:</label>
            <input type="radio" id="inpt" name="role" value="admin" >
            <label>Admin</label>
            <input type="radio"  name="role" value="author">
            <label>Author</label>
            <input type="radio"  name="role" value="user">
            <label>User</label>
            <hr>
            <input type="submit" value="Update" name="update" class="btn btn-primary">
            </fieldset>
        </form>
        <?php
					}
			}
		?>
    
    </div>
        </main>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
        </body>
        </html>




   <?php
}else{
  header('location: login.php');
}
?>
 <?php
include('includes/scripts.php');
include('includes/footer.php');

?>