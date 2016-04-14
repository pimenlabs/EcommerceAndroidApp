<?php
	include_once('includes/connect_database.php'); 
?>

<div id="content" class="container col-md-12">
	<?php 
		if(isset($_POST['btnDelete'])){
			if(isset($_GET['id'])){
				$ID = $_GET['id'];
			}else{
				$ID = "";
			}
			
			// delete data from pemesanan table
			$sql_query = "DELETE FROM tbl_reservation 
					WHERE ID = ?";
			
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$delete_result = $stmt->store_result();
				$stmt->close();
			}
			
			// if delete data success back to pemesanan page
			if($delete_result){
				header("location: pemesanan.php");
			}
		}

		if(isset($_POST['btnNo'])){
			header("location: pemesanan.php");
		}


	?>
	<h1>Confirm Action</h1>
	<hr />
	<form method="post">
		<p>Are you sure want to delete this data?</p>
		<input type="submit" class="btn btn-primary" value="Delete" name="btnDelete"/>
		<input type="submit" class="btn btn-danger" value="Cancel" name="btnNo"/>
	</form>
	<div class="separator"> </div>
</div>
			
<?php include_once('includes/close_database.php'); ?>