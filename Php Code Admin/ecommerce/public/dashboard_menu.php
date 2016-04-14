<?php
	include_once('includes/connect_database.php'); 
	include_once('functions.php'); 
?>

<?php

	//Total order count
	$sql_order = "SELECT COUNT(*) as num FROM tbl_reservation";
	$total_order = mysqli_query($connect, $sql_order);
	$total_order = mysqli_fetch_array($total_order);
	$total_order = $total_order['num'];

	//Total category count
	$sql_category = "SELECT COUNT(*) as num FROM tbl_category";
	$total_category = mysqli_query($connect, $sql_category);
	$total_category = mysqli_fetch_array($total_category);
	$total_category = $total_category['num'];

	//Total menu count
	$sql_menu = "SELECT COUNT(*) as num FROM tbl_menu";
	$total_menu = mysqli_query($connect, $sql_menu);
	$total_menu = mysqli_fetch_array($total_menu);
	$total_menu = $total_menu['num'];

?>
<div id="content" class="container col-md-12">

<div class="col-md-12">
		<h1>Dashboard</h1>
		<hr/>
	</div>

	 	<a href="pemesanan.php">
			<div class="col-sm-6 col-md-2">
	            <div class="thumbnail">    
	              <div class="caption">
	              <center>
	              <img src="images/ic_order.png" width="100" height="100">
	                <h3><?php echo $total_order;?></h3>
	                <p class="detail">Order List</p>  
	                </center>
	              </div>
	            </div>
	         </div>
	    </a>

 		<a href="category.php">
			<div class="col-sm-6 col-md-2">
	            <div class="thumbnail">    
	              <div class="caption">
	              <center>
	              <img src="images/ic_category.png" width="100" height="100">
	                <h3><?php echo $total_category;?></h3>
	                <p class="detail">Category</p>  
	                </center>
	              </div>
	            </div>
	         </div>
	    </a>

		<a href="menu.php">
          <div class="col-sm-6 col-md-2">
            <div class="thumbnail">    
              <div class="caption">
              <center>
              <img src="images/ic_menu.png" width="100" height="100">
                <h3><?php echo $total_menu;?></h3>
                <p class="detail">Menu List</p>  
                </center>
              </div>
            </div>
          </div>
        </a>

        <a href="admin.php">
          <div class="col-sm-6 col-md-2">
            <div class="thumbnail"> 
              <div class="caption">
              <center>
              <img src="images/ic_setting.png" width="100" height="100">
                <h3><br></h3>
                <p class="detail">Setting</p>     
                </center>
              </div>
            </div>
          </div>
        </a>
</div>

<?php include_once('includes/close_database.php'); ?>