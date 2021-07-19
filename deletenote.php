<?php
include "config.php";


if (isset($_GET['id'])) {
  $nid = $_GET['id'];


  $sql = "DELETE FROM `content` WHERE `nid`='$nid'";



  $result = $conn->query($sql);

  if ($result == TRUE) {
     header('location: notes.php');

  }else{
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
}

?>