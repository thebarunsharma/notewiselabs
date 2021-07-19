
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

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=nms", "root", "");

if($_POST["query"] != '')
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$query = 
	"SELECT content.nid,content.title,content.description,tag.tags,users.name FROM content join tag join users WHERE content.user_id=users.id and content.tag_name=tag.id and tag_name IN (".$search_text.") ";

}
else
{
	$usernam=$_SESSION["user_name"];
	$query1 =mysqli_query($conn,"SELECT * FROM users WHERE user_name='$usernam'");
	$row1=mysqli_fetch_array($query1);
	$ida=$row1["id"];
	$query = "SELECT content.description,content.nid,content.title,tag.tags,users.name FROM content,tag,users where content.user_id=$ida and content.tag_name=tag.id AND content.user_id=users.id";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			
			<td>'.$row["name"].'</td>
			<td>'.$row["title"].'</td>
			<td>'.$row["tags"].'</td>
			<td>'.$row["description"].'</td>
			<td><a  type="button" title="View"  href="expand.php?id= '. $row['nid'].'"><input type="image" src="images/viewf.svg"></a>
                <a  type="button" title="Edit"  href="edit.php?id='. $row['nid'].'"><input type="image" src="images/edit.svg"></a>
                <a  type="button" title="Delete" href="delete.php?id='. $row['nid'].'"><input type="image" src="images/del.svg"></a></td> 

			
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="5" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;


?>
<?php
  }
?>