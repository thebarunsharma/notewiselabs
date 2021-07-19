

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
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Notes </title>
  </head>
<body>
<div class="container-fluid">

  
    <?php
    if(isset($_POST['search'])){
      // echo $_POST['search'];
      // die("assas");
      if($_POST['tle']!=""){
        $usernam=$_SESSION["user_name"];
        $query1 =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
        $rowz=mysqli_fetch_array($query1);
        $ida=$rowz["id"];
           $title = "%".$_POST['tle']."%";
           $query=mysqli_query($conn,"SELECT content.nid,content.title,content.description,tag.tags FROM content JOIN tag WHERE title LIKE '$title' AND content.tag_name=tag.id And user_id=$ida");
          $rowcount = mysqli_num_rows($query);
      ?><br>

<br>
<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Note Title</th>
            <th>Note Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
 <?php
 for($i=1;$i<=$rowcount;$i++)
 {
    $rows=mysqli_fetch_array($query);
    
?>
<tr>
    
    <td><?php echo substr($rows['title'],0,50)?>  </td>
    <td><?php echo substr($rows['description'],0,40); ?>...</td>
    <td><a  type="button" title="View"  href="expand.php?id=<?php echo $row2['nid']; ?>"><input type="image" src="images/viewf.svg"></a>
              <a  type="button" title="Edit"  href="edit.php?id=<?php echo $row2['nid']; ?>"><input type="image" src="images/edit.svg"></a>
              <a  type="button" title="Delete" href="delete.php?id=<?php echo $row2['nid']; ?>"><input type="image" src="images/del.svg"></a></td> 
</tr>
</div>
</div>
<?php
}}else{
    echo "<h1>No record</h1>";
  }}
?>
   


<?php
}else{
  header('location: login.php');
}
?>

<?php
include('includes/scripts.php');
include('includes/footer.php');

?>
