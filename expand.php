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


<body>
<?php
                    if(isset($_GET['id'])){
                    $nid= $_GET['id'];

                    include "config.php";
                    $sql = "SELECT * FROM content WHERE nid=$nid";


                    if($result = $conn->query($sql)){
                    $row2= $result->fetch_assoc();
                    }
                    ?>
                    <div class="container-fluid"> 
        <form method="post" action="ckupdate.php"  >
       <h2>Title:</h2></label>
            <input title="Note Title" type="text" name="title" id="inpt" value="<?php echo $row2['title']?>"readonly><br>
            <input type="hidden" name="nid" value="<?php echo $nid; ?>">
        <br>
          <div>
            <div >
            <div>
              <textarea  readonly class="ckeditor" name="area"  required id="editor1"?><?php echo $row2['description'] ?></textarea>
            </div>
          </div>
        </form>

<?php
}}else{
  header('location: login.php');
}
?>




  <?php
       include('includes/scripts.php');
       include('includes/footer.php');

?>