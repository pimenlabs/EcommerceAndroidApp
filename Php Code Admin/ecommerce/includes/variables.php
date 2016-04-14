<?php
	//database configuration
	$host ="localhost";
	$user ="root";
	$pass ="";
	$database = "ecommerce";
	$connect = new mysqli($host, $user, $pass,$database) or die("Error : ".mysql_error());
	
	//access key to access API
	$access_key = "12345";
	
	//google play url
	$gplay_url = "https://play.google.com/store/apps/details?id=your.package.com";
	
	// email configuration
	$admin_email = "youremail@gmail.com";
	$email_subject = "Notification of changes to account information!";
	$change_message = "You have change your admin info such as email and or password.";
	$reset_message = "Your new password is ";
	
	//order notification configuration
	$reservation_subject = "New Order Notification!";
	$reservation_message = "There is new order, please check Admin Panel.";
	
	//copyright
	$copyright = "";
?>