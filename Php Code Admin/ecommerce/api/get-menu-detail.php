<?php
	include_once('../includes/connect_database.php'); 
	include_once('../includes/variables.php');
	
	if(isset($_GET['accesskey']) && isset($_GET['menu_id'])) {
		$access_key_received = $_GET['accesskey'];
		$menu_ID = $_GET['menu_id'];
		
		if($access_key_received == $access_key){
			// get menu data from menu table
			$sql_query = "SELECT Menu_ID, Menu_name, Menu_image, Price, Serve_for, Description, Quantity 
				FROM tbl_menu 
				WHERE Menu_ID = ".$menu_ID;
				
			$result = $connect->query($sql_query) or die ("Error :".mysql_error());
	 
			$menus = array();
			while($menu = $result->fetch_assoc()) {
				$menus[] = array('Menu_detail'=>$menu);
			}
		 
			// create json output
			$output = json_encode(array('data' => $menus));
		}else{
			die('accesskey is incorrect.');
		}
	} else {
		die('accesskey and menu id are required.');
	}
 
	//Output the output.
	echo $output;

	include_once('../includes/close_database.php'); 
?>