<?php
	include_once('includes/connect_database.php'); 
?>

<div id="content" class="container col-md-12">
	<?php 
		if(isset($_GET['id'])){
			$ID = $_GET['id'];
		}else{
			$ID = "";
		}
			
		// create array variable to handle error
		$error = array();
			
		// create array variable to store data from database
		$data = array();
			
		if(isset($_POST['btnSave'])){
			$process = $_POST['status'];
			$sql_query = "UPDATE tbl_reservation 
					SET Status = ? 
					WHERE ID = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('ss', $process, $ID);
				// Execute query
				$stmt->execute();
				// store result 
				$update_result = $stmt->store_result();
				$stmt->close();
			}
			
			// check update result
			if($update_result){
				$error['update_data'] = " <span class='label label-primary'>Success changed</span>";
			}else{
				$error['update_data'] = " <span class='label label-danger'>Failed</span>";
			}
		}
		
		// get data from reservation table
		$sql_query = "SELECT * 
				FROM tbl_reservation 
				WHERE ID = ?";
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Bind your variables to replace the ?s
			$stmt->bind_param('s', $ID);
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($data['ID'], 
					$data['Name'],
					$data['Alamat'],
					$data['Kota'],
					$data['Provinsi'],
					$data['Number_of_people'], 
					$data['Date_n_Time'], 
					$data['Phone_number'],
					$data['Order_list'],
					$data['Status'],
					$data['Comment'],
					$data['Email']
					);
			$stmt->fetch();
			$stmt->close();
		}
		
		// parse order list into array
		$order_list = explode(',',$data['Order_list']);
			
	?>


<div class="col-md-7 col-md-offset-2">
	<center>
		<h1>Order Detail</h1>
		<?php echo isset($error['update_data']) ? $error['update_data'] : '';?>
	</center>
	<form method="post">
	<br>
		<table table class='table table-bordered table-condensed'>
			<tr class="row">
				<th class="detail active">ID</th>
				<td class="detail"><?php echo $data['ID']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Name</th>
				<td class="detail"><?php echo $data['Name']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Address</th>
				<td class="detail"><?php echo $data['Alamat']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">City</th>
				<td class="detail"><?php echo $data['Kota']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Province</th>
				<td class="detail"><?php echo $data['Provinsi']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Email</th>
				<td class="detail"><?php echo $data['Email']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Shipping by</th>
				<td><?php echo $data['Number_of_people'];?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Time</th>
				<td class="detail"><?php echo $data['Date_n_Time']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Phone</th>
				<td class="detail"><?php echo $data['Phone_number']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Order list</th>
				<td class="detail">
					<ul>
					<?php
						$count = count($order_list);
						for($i = 0;$i<$count;$i++){
							if($i == ($count -1)){
								echo "<br /><li><strong>".$order_list[$i]."</strong></li>";
							}else{
								echo "<li>".$order_list[$i]."</li>";
							}
						}
					?>
					</ul>
				</td>
			</tr>
			<tr class="row">
				<th class="detail active">Comment</th>
				<td class="detail"><?php echo empty($data['Comment']) ? 'No comment' : $data['Comment']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail active">Status</th>
				<td class="detail">
					<select name="status" class="form-control">	
						<?php if($data['Status'] == 1){ ?>
							<option value="1" selected="selected">Processed</option>
							<option value="0" >Not Processed</option>
						<?php }else{?>
							<option value="1" >Processed</option>
							<option value="0" selected="selected">Not Processed</option>
						<?php }?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" value="Save" name="btnSave"/>
	
	</form>
</div>

	<div class="separator"> </div>
</div>
			
<?php include_once('includes/close_database.php'); ?>