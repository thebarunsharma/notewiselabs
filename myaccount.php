<?php
  include "config.php";

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
  <body>
  
   
    <?php
if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $numby =$_POST['number'];



        $sqli = " UPDATE users SET  `name`='$name',`user_name`='$user_name',`email`='$email', `number`='$numby'  WHERE `id`='$id'";


        $result = $conn->query($sqli);

        if ($result == TRUE) {
          ?> <hr><?php
            echo "Updated successfully.";
        }else{
            echo "Error:" . $sqli . "<br>" . $conn->error;
        }
    }
    $ida = $_SESSION['id'];

      $sql = "SELECT * FROM users where id = $ida";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
    ?>
    <div class="container-fluid">


               <h2>My Account</h2>
            <form action="" method="post">
        <label title="Username can only be changed by admin, contact admin" class="col-form-label">Username:</label><br>
            <input  type="text" id="inpt"   name="user_name" value="<?php echo $row['user_name'] ?>"><br>
            <label class=" col-form-label">Current Role:</label><br>

            <input type="text" id="inpt" name="role" value="<?php echo $row['role'] ?>"><br>
          
            <label class=" col-form-label">Full name:</label><br>
            <input type="text" id="inpt" name="name" value="<?php echo $row['name'] ?>">
             <input type="hidden" name="id" value="<?php echo $row['id'] ?>"><br>
            <label class="col-form-label">Email:</label><br>
            
            <input type="email" id="inpt" name="email" value="<?php echo $row['email'] ?>">
            <br>
            <label class=" col-form-label">Number:</label><br>
        
            <input type="number" id="inpt" name="number"   value="<?php echo $row['number'] ?>">
            <br>
            
            <br>
            <input class="btn btn-primary form-group-row" hre type="submit" value="Update" name="update">

            <?php
        }

      }
    ?>

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
}else{
  header('location: login.php');
}
?>
  <?php
include('includes/scripts.php');
include('includes/footer.php');

?>
