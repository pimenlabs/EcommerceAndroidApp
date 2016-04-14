<?php
	include_once('includes/connect_database.php'); 
?>
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
				$error['update_data'] = " <span class='label label-primary'>Berhasil diubah</span>";
			}else{
				$error['update_data'] = " <span class='label label-danger'>Gagal</span>";
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
					$data['Number_of_people'], 
					$data['Date_n_Time'], 
					$data['Phone_number'],
					$data['Order_list'],
					$data['Status'],
					$data['Comment']
					);
			$stmt->fetch();
			$stmt->close();
		}
		
		// parse order list into array
		$order_list = explode(',',$data['Order_list']);
			
	?>

		<h3>Billing Note</h3>
		<br>
		

		<?php echo isset($error['update_data']) ? $error['update_data'] : '';?>

		<table width="100%" class="tulisan">
			<tr>
			<td>Name : <?php echo $data['Name']; ?></td>
			</tr>
			
			<tr>
			<td>Address : <?php echo $data['Alamat']; ?></td>
			</tr>
			
			<tr>
			<td>Time : <?php echo $data['Date_n_Time']; ?></td>
			</tr>
			
			<tr>
			<td><hr></td>
			</tr>
			<tr>
				<td>					
					<?php
						$count = count($order_list);
						for($i = 0;$i<$count;$i++){
							if($i == ($count -1)){
								echo "<hr>";
								echo "<strong><li>".$order_list[$i]."</li></strong>";

							}else{
								echo "<li>".$order_list[$i]."</li>";
							}
						}
					?>
					
				</td>
			</tr>
			
		</table>

		<button class="btn btn-primary" onclick="fungsiprint()">Print</button>

		<script>
		function fungsiprint()
		{
			window.print();
		}
		</script>

<?php include_once('includes/close_database.php'); ?>