<?php
	include_once('connect_database.php');
	include('variables/variables.php'); 
?>

<div id="login_content">
	<?php 
		if(isset($_GET['id'])){
			$ID = $_GET['id'];
		}else{
			$ID = "";
		}
		
		// create array variable to store data from database
		$data = array();
		
		$sql_query = "set names 'utf8'";
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Execute query
		$stmt->execute();
		// store result 
		$stmt->close();
	}
		
		// get currency symbol from setting table
		$sql_query = "SELECT Value 
				FROM tbl_setting 
				WHERE Variable = 'Currency'";
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($currency);
			$stmt->fetch();
			$stmt->close();
		}	
		
		// get all data from menu table and category table
		$sql_query = "SELECT Menu_ID, Menu_name, Serve_for, Price, Category_name, Menu_image, Description 
				FROM tbl_menu m, tbl_category c
				WHERE m.Menu_ID = ? AND m.Category_ID = c.Category_ID";
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Bind your variables to replace the ?s
			$stmt->bind_param('s', $ID);
			// Execute query
			$stmt->execute();
			// store result 
			$result = $stmt->store_result();
			$stmt->bind_result($data['Menu_ID'], 
					$data['Menu_name'], 
					$data['Serve_for'], 
					$data['Price'], 
					$data['Category_name'],
					$data['Menu_image'],
					$data['Description']
					);
			$stmt->fetch();
			$stmt->close();
		}
		
		if(empty($ID)){
	?>
	<h1>Error 404</h1>
	<div class="menu_content">
		<p>The article you are searching for is not available.</p>
	</div>
	<?php }else{ ?>
	<h1><?php echo $data['Menu_name']; ?></h1>
	<div class="menu_content">
		<img src="<?php echo $data['Menu_image']; ?>" width="280" height="200"/>
		<p class="menu_margin">Serve for: <?php echo $data['Serve_for']; ?> people(s)</p>
		<p>Price: <?php echo $data['Price']." ".$currency; ?></p>
		<p>Category: <?php echo $data['Category_name']; ?></p>
		<p class="menu_margin"><?php echo $data['Description']; ?></p>
		<div id="menu_button">
			<a href="<?php echo $gplay_url; ?>">Download on Google Play</a>
		</div>
	</div>
	<div class="separator"> </div>
	<?php } ?>
</div>
			
<?php include_once('includes/close_database.php'); ?>