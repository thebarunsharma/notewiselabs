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


    if(isset($_GET['id'])){
    $nid= $_GET['id'];

    include "config.php";
    $sql = "SELECT * FROM content WHERE nid=$nid";


    if($result = $conn->query($sql)){
    $row2= $result->fetch_assoc();

    }
?>
    <?php
        include('includes/header.php'); 
        include('includes/navbar.php'); 
    ?>
<body>
<div class="container-fluid"> 
<h2>Edit Note</h2><br>
    <style>
      .success {
  background: #D4EDDA;
  color: #40754C;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  margin: 20px auto;  
  }
    </style>
    <form method="post" action="ckupdate.php"  >
   
      <label for="title"  >Edit title:</label><br>
        <input type="text" name="title" id="inpt" value="<?php echo $row2['title']?>"><br>
        <input type="hidden" name="nid" value="<?php echo $nid; ?>">
    <br>
      <div>
        <label>Edit Description:</label>
        <div >
          <textarea class="ckeditor" name="area"  required id="editor1"?><?php echo $row2['description'] ?></textarea>
        </div>
      </div>

      <div >
        
        <div ><br>
          <input type="submit" value="Update" name="update" class="btn btn-primary">
        </div>
      </div>
    </form>
</div>

<?php
}}else{
  header('location: login.php');
}
?>




  <?php
       include('includes/scripts.php');
       include('includes/footer.php');

?>