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
<!doctype html>
<html lang="en">
  <head>
    <style>
      <style>
  .error {
  background: #F2DEDE;
  color: #A94442;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;
  }

  .success {
  background: #D4EDDA;
  color: #40754C;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;  
  }
</style>
    
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

    <title>change Password</title>
  </head>
  <body>
 
    <main>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="row">
               <div class="col-md-10">
    <form action="change-p.php" method="post">
     	<h2>Change Password</h2> <br>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
     <label class="col-sm-2 col-form-label">Current Password:</label>
     	<input type="password" id="inpt" name="op"><br><br>

     	<label class="col-sm-2 col-form-label">New Password:</label>
     	<input type="password" id="inpt" name="np"><br><br>

     	<label class="col-sm-2 col-form-label">Confirm New Password:</label>
     	<input type="password" id="inpt" name="c_np"><br><br><br>

     <input class="btn btn-primary form-group-row" hre type="submit" value="Update" name="update">
     </form>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </main>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<?php
}else{
  header('location: login.php');
}
?>
