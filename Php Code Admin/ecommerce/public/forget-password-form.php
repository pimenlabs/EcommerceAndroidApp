<div id="content" class="container col-md-12">

<?php
	include_once('includes/connect_database.php'); 
	include('functions.php'); 

	if(isset($_POST['btnReset'])){

		$username = $_POST['username'];
		
		$function = new functions;
		
		// create array variable to handle error
		$error = array();
		
		// create array variable to store data
		$data = array();

		if(empty($username)){
			$error['username'] = "*Username should be filled.";
		}else{
			// check username in user table
			$sql_query = "SELECT Password, Email 
					FROM tbl_user 
					WHERE Username = ?";
			
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {	
				// Bind your variables to replace the ?s
				$stmt->bind_param('s', $username);
				// Execute query
				$stmt->execute();
				// store result 
				$result = $stmt->store_result();
				$stmt->bind_result($data['Password'],
					$data['Email']
					);
				$stmt->fetch();
				$num = $stmt->num_rows;
				$stmt->close();
			}
			
			// if username exist send new password
			if($num == 1){
				$email = $data['Email'];
				$string = 'abcdefghijklmnopqrstuvwxyz';
				$password = $function->get_random_string($string, 6);
				$encrypt_password = hash('sha256',$username.$password);
				
				// store new password to user table
				$sql_query = "UPDATE tbl_user 
						SET Password = ? 
						WHERE Username = ?";
				
				$stmt = $connect->stmt_init();
				if($stmt->prepare($sql_query)) {	
					// Bind your variables to replace the ?s
					$stmt->bind_param('ss', 
							$encrypt_password,
							$username);
					// Execute query
					$stmt->execute();
					// store result 
					$reset_result = $stmt->store_result();
					$stmt->close();
				}
				
				// send new password to user email
				if($reset_result){
					$to = $email;
					$subject = $email_subject;
					$message = $reset_message." ".$password;
					$from = $admin_email;
					$headers = "From: ".$from;
					mail($to,$subject,$message,$headers);
					
					$error['reset_result'] = "*New Password has been sent to your email.";
				}else{
					$error['reset_result'] = "*Failed getting new password.";
				}
				
			}else{
				$error['reset_result'] = "*Username is not available.";
			}
		}	
	}
?>

<div id="login_content">
	<h1>Reset Password</h1>
	<hr>
	<div class="col-md-3">
    	<form method="post">
    		<label>Username:</label>
			<input type="text" name="username" class="form-control" />
			<?php echo isset($error['username']) ? $error['username'] : '';?>
			<?php echo isset($error['reset_result']) ? $error['reset_result'] : '';?>
			<br>
			<input type="submit" class="btn btn-primary" value="Send" name="btnReset"/>
    	</form>
    	<br>
    	<a href="index.php"><p class="pull-right">Cancel</p></a>
    </div>
</div>
</div>
<?php include_once('includes/close_database.php'); ?>