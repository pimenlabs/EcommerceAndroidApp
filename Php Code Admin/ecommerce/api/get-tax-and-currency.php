<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	
	if(isset($_GET['accesskey'])) {
		$access_key_received = $_GET['accesskey'];
		
		if($access_key_received == $access_key){
		
			// get tax from setting table
			$sql_query = "SELECT * 
					FROM tbl_setting 
					WHERE Variable = 'Tax'";
					
			$result_to_get_tax = $connect->query($sql_query) or die ("Error :".mysql_error());
			$tax = $result_to_get_tax->fetch_assoc();
			
			// get currency symbol from setting table
			$sql_query = "SELECT * 
					FROM tbl_setting 
					WHERE Variable = 'Currency'";
					
			$result_to_get_currency = $connect->query($sql_query) or die ("Error :".mysql_error());
			$currency = $result_to_get_currency->fetch_assoc();

			$tax_n_currency = array();
			
			$tax_n_currency[] = array('tax_n_currency'=>$tax);
			$tax_n_currency[] = array('tax_n_currency'=>$currency);
			
			// create json output
			$output = json_encode(array('data' => $tax_n_currency));
		}else{
			die('accesskey is incorrect.');
		}
	} else {
		die('accesskey is required.');
	}
 
	//Output the output.
	echo $output;

	include_once('../includes/close_database.php'); 
?>