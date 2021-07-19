

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
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4><?php 
                                $query = "SELECT id FROM users ORDER BY id";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4> '.$row.' </h4>' ;?>
                                </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
             
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Notes</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                $usernam=$_SESSION["user_name"];
                                $query1 =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
                                $row1=mysqli_fetch_array($query1);
                                $ida=$row1["id"];
                                $query=mysqli_query($conn,"SELECT nid FROM content ");
                                $rowcount = mysqli_num_rows($query);
                                echo '<h4>' .$rowcount.'</h4>';
                                ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Your Notes</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php 
                                $usernam=$_SESSION["user_name"];
                                $query1 =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
                                $row1=mysqli_fetch_array($query1);
                                $ida=$row1["id"];
                                $query=mysqli_query($conn,"SELECT nid FROM content WHERE user_id=$ida");
                                $rowcount = mysqli_num_rows($query);
                                echo '<h4>' .$rowcount.'</h4>';
                                ?></div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Admins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                $query = "SELECT id FROM users where role = 'admin' ORDER BY id";
                                $query_run = mysqli_query($conn, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h4> '.$row.' </h4>' ;?>
                                </h4></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->



  <?php
}else{
  header('location: login.php');
}
?>




  <?php
include('includes/scripts.php');
include('includes/footer.php');

?>