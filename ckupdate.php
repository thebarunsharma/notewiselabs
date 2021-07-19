<?php
include "config.php";


    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['area'];
        $nid= $_POST['nid'];
        $sql = "UPDATE content SET title='$title',description='$description' WHERE nid=$nid";


        $result = $conn->query($sql);

        if ($result == TRUE) {
            ?> <hr><?php
            header("Location: allnotes.php?success=The note has been updated successfully");
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } ?>
