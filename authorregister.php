

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

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Author Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code3.php" method="POST">
      
        <div class="modal-body">
        <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="uname" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" placeholder="Phone Number" class="form-control" >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="re_password" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="registerbtn" class="btn btn-primary" value="Add">
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add  Author Profile 
            </button>
          
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>ID</th>
		      <th>Name</th>
		      <th>Username</th>
		      <th>Email</th>
		      <th>Number</th>
          <th>Role</th>
          <th>Edit</th>
		      <th>Delete</th>
          </tr>
        </thead>
        <tbody>
     
        <?php

            $sql = "SELECT * FROM `users` WHERE role = 'author'";


            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              //output data of each row
              while ($row = $result->fetch_assoc()) {
            ?>

    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['user_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['number']; ?></td>
    <td><?php echo $row['role']; ?></td>
                <td>
                    
                    <a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                </form>
            </td>
            <td>
            <a class="btn btn-danger" href="crud/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
          </tr>
          <?php
					}
			}
		?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<?php
}else{
  header('location: login.php');
}
?>
