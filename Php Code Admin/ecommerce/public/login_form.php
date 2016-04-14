<?php
	include_once('includes/connect_database.php'); 
	
	// start session
	//session_start();
	
	// if user click Login button
	if(isset($_POST['btnLogin'])){
	
		// get username and password
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// set time for session timeout
		$currentTime = time() + 25200;
		$expired = 3600;
		
		// create array variable to handle error
		$error = array();
		
		// check whether $username is empty or not
		if(empty($username)){
			$error['username'] = "*Username should be filled.";
		}
		
		// check whether $password is empty or not
		if(empty($password)){
			$error['password'] = "*Password should be filled.";
		}
		
		// if username and password is not empty, check in database
		if(!empty($username) && !empty($password)){
			
			// change username to lowercase
			$username = strtolower($username);
			
			//encript password to sha256
		    $password = hash('sha256',$username.$password);
			
			// get data from user table
			$sql_query = "SELECT * 
				FROM tbl_user 
				WHERE username = ? AND password = ?";
						
			$stmt = $connect->stmt_init();
			if($stmt->prepare($sql_query)) {
				// Bind your variables to replace the ?s
				$stmt->bind_param('ss', $username, $password);
				// Execute query
				$stmt->execute();
				/* store result */
				$stmt->store_result();
				$num = $stmt->num_rows;
				// Close statement object
				$stmt->close();
				if($num == 1){
					$_SESSION['user'] = $username;
					$_SESSION['timeout'] = $currentTime + $expired;
					header("location: dashboard.php");
				}else{
					$error['failed'] = "<span class='label label-danger'>Invalid Username or Password!</span>";
				}
			}
			
		}	
	}
	?>
<div id="login_content" class="col-md-11 login">
  	<div class="col-md-4 col-md-offset-4">
	      <div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
				  <center><h3>Login Administrator</h3></center>
				  <center>( E-Commerce Android App )</center>
			  </div>
			  <div class="panel-body">
				<center><?php echo isset($error['failed']) ? $error['failed'] : '';?></center>
				<br>
				    <form method="post">
				            <label>Username :</label>
				            <input type="text" name="username" class="form-control" required>
							
							<br>
				            <label>Password :</label>
				            <input type="password" class="form-control" name="password" required>
							
							<br>
							<button type="submit" name="btnLogin" class="btn btn-primary pull-right">Login</button><br><br>		
				    </form>
				<a href="forget-password.php"><p class="pull-right">Forgot Password?</p></a>
			  </div>
			</div>
	</div>
</div>


<?php include_once('includes/close_database.php');?>