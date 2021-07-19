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
<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=nms", "root", "");

$query = "SELECT * FROM tag";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<html>
	<body>
    <div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Notes
           
    </h6>
    <br>
			
			<select name="multi_search_filter" id="multi_search_filter">
            <option value="disable">Choose category</option>
			<?php
			foreach($result as $row)
			{
				echo '<option value="'.$row["id"].'">'.$row["tags"].'</option>';	
			}
			?>
			</select>
			<input type="hidden" name="hidden_country" id="hidden_country" />
			<div style="clear:both"></div>
			<br />
            <div class="card-body">

			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Note Title</th>
							<th>Category</th>
							<th>Descriptions</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			
		</div>
	</body>
</html>


<script>
$(document).ready(function(){

	load_data();
	
	function load_data(query='')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#multi_search_filter').change(function(){
		$('#hidden_country').val($('#multi_search_filter').val());
		var query = $('#hidden_country').val();
		load_data(query);
	});
	
});
</script>

  <?php
include('includes/scripts.php');
include('includes/footer.php');?>
<?php
}else{
  header('location: login.php');
}
?>




