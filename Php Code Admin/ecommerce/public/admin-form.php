<?php
	include_once('includes/connect_database.php'); 
	include('includes/variables.php'); 
?>

<div id="content" class="container col-md-12">
	<?php 
			$username = $_SESSION['user'];
			$sql_query = "SELECT Password, Email 
					FROM tbl_user 
					WHERE Username = ?";
			
			// create array variable to store previous data
			$data = array();
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $username);			
				// Execute query
				$stmt->execute();
				// store result 
				$stmt->store_result();
				$stmt->bind_result($data['Password'], $data['Email']);
				$stmt->fetch();
				$stmt->close();
			}
			
			$previous_password = $data['Password'];
			$previous_email = $data['Email'];
			
			if(isset($_POST['btnChange'])){
				$email = $_POST['email'];
				$old_password = hash('sha256',$username.$_POST['old_password']);
				$new_password = hash('sha256',$username.$_POST['new_password']);
				$confirm_password = hash('sha256',$username.$_POST['confirm_password']);
				
				// create array variable to handle error
				$error = array();
				
				// check password
				if(!empty($_POST['old_password']) || !empty($_POST['new_password']) || !empty($_POST['confirm_password'])){
					if(!empty($_POST['old_password'])){
						if($old_password == $previous_password){
							if(!empty($_POST['new_password']) || !empty($_POST['confirm_password'])){
								if($new_password == $confirm_password){
									// update password in user table
									$sql_query = "UPDATE tbl_user 
											SET Password = ?
											WHERE Username = ?";
									
									$stmt = $connect->stmt_init();
									if($stmt->prepare($sql_query)) {	
										// Bind your variables to replace the ?s
										$stmt->bind_param('ss', 
													$new_password, 
													$username);
										// Execute query
										$stmt->execute();
										// store result 
										$update_result = $stmt->store_result();
										$stmt->close();
									}
								}else{
									$error['confirm_password'] = " <span class='label label-danger'>New password don't match!</span>";
								}
							}else{
								$error['confirm_password'] = " <span class='label label-danger'>New password and re new password required!</span>";
							}
						}else{
							$error['old_password'] = " <span class='label label-danger'>Old password wrong!</span>";
						}
					}else{
						$error['old_password'] = " <span class='label label-danger'>Old password required!</span>";
					}
				}
				
				if(empty($email)){
					$error['email'] = " <span class='label label-danger'>Email required!</span>";
				}else{
					$valid_mail = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
					if (!preg_match($valid_mail, $email)){
						$error['email'] = " <span class='label label-danger'>Wrong email format!</span>";
						$email = "";
					}else{
						// update password in user table
						$sql_query = "UPDATE tbl_user 
								SET Email = ?
								WHERE Username = ?";
						
						$stmt = $connect->stmt_init();
						if($stmt->prepare($sql_query)) {	
							// Bind your variables to replace the ?s
							$stmt->bind_param('ss', 
										$email, 
										$username);
							// Execute query
							$stmt->execute();
							// store result 
							$update_result = $stmt->store_result();
							$stmt->close();
						}
					}
				}
				
				// check update result
				if($update_result){
					$to = $email;
					$subject = $email_subject;
					$message = $change_message;
					$from = $admin_email;
					$headers = 'From:' . $from;
					mail($to,$subject,$message,$headers);
					$error['update_user'] = " <h4><div class='alert alert-success'>
														Success changed
												 </div>
												  </h4>";
				}else{
					$error['update_user'] = " <h4><div class='alert alert-danger'>
														Failed
												 </div>
												  </h4>";
				}
			}		

			$sql_query = "SELECT Email FROM tbl_user WHERE Username = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $username);			
				// Execute query
				$stmt->execute();
				// store result 
				$stmt->store_result();
				$stmt->bind_result($previous_email);
				$stmt->fetch();
				$stmt->close();
			}		
	?>
	<div class="col-md-12">
		<h1>Admin</h1>
		<?php echo isset($error['update_user']) ? $error['update_user'] : '';?>
		<hr />
	</div>
	
	<div class="col-md-5">
		<form method="post">
			<label>Username :</label>
			<input type="text" class="form-control" id="disabledInput" value="<?php echo $username; ?>" disabled/>
			<br/>

			<label>Email :</label><?php echo isset($error['email']) ? $error['email'] : '';?>
			<input type="email" class="form-control" name="email" value="<?php echo $previous_email; ?>"/>
			<br/>

		    <label>Old Password :</label><?php echo isset($error['old_password']) ? $error['old_password'] : '';?>
			<input type="password" class="form-control" name="old_password"/>
			<br/>

		    <label>New Password :</label><?php echo isset($error['new_password']) ? $error['new_password'] : '';?>
			<input type="password" class="form-control" name="new_password"/>
			<br/>

			<label>Re Type New Password :</label><?php echo isset($error['confirm_password']) ? $error['confirm_password'] : '';?>
			<input type="password" class="form-control" name="confirm_password"/>
			<br/>

		    <input type="submit" class="btn-primary btn" value="Change" name="btnChange"/>		
		</form>
	<div class="col-md-5">

	<div class="separator"> </div>
</div>
			
<?php include_once('includes/close_database.php'); ?>
