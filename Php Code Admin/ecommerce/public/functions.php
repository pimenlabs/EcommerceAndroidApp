<?php
	class functions{
		
		public $currency_info = array(
			array('code' => 'AED', 'name' => 'United Arab Emirates Dirham'),
			array('code' => 'ANG', 'name' => 'NL Antillian Guilder'),
			array('code' => 'ARS', 'name' => 'Argentine Peso'),
			array('code' => 'AUD', 'name' => 'Australian Dollar'),
			array('code' => 'BRL', 'name' => 'Brazilian Real'),
			array('code' => 'BSD', 'name' => 'Bahamian Dollar'),
			array('code' => 'CAD', 'name' => 'Canadian Dollar'),
			array('code' => 'CHF', 'name' => 'Swiss Franc'),
			array('code' => 'CLP', 'name' => 'Chilean Peso'),
			array('code' => 'CNY', 'name' => 'Chinese Yuan Renminbi'),
			array('code' => 'COP', 'name' => 'Colombian Peso'),
			array('code' => 'CZK', 'name' => 'Czech Koruna'),
			array('code' => 'DKK', 'name' => 'Danish Krone'),
			array('code' => 'EUR', 'name' => 'Euro'),
			array('code' => 'FJD', 'name' => 'Fiji Dollar'),
			array('code' => 'GBP', 'name' => 'British Pound'),
			array('code' => 'GHS', 'name' => 'Ghanaian New Cedi'),
			array('code' => 'GTQ', 'name' => 'Guatemalan Quetzal'),
			array('code' => 'HKD', 'name' => 'Hong Kong Dollar'),
			array('code' => 'HNL', 'name' => 'Honduran Lempira'),
			array('code' => 'HRK', 'name' => 'Croatian Kuna'),
			array('code' => 'HUF', 'name' => 'Hungarian Forint'),
			array('code' => 'IDR', 'name' => 'Indonesian Rupiah'),
			array('code' => 'ILS', 'name' => 'Israeli New Shekel'),
			array('code' => 'INR', 'name' => 'Indian Rupee'),
			array('code' => 'ISK', 'name' => 'Iceland Krona'),
			array('code' => 'JMD', 'name' => 'Jamaican Dollar'),
			array('code' => 'JPY', 'name' => 'Japanese Yen'),
			array('code' => 'KRW', 'name' => 'South-Korean Won'),
			array('code' => 'LKR', 'name' => 'Sri Lanka Rupee'),
			array('code' => 'MAD', 'name' => 'Moroccan Dirham'),
			array('code' => 'MMK', 'name' => 'Myanmar Kyat'),
			array('code' => 'MXN', 'name' => 'Mexican Peso'),
			array('code' => 'MYR', 'name' => 'Malaysian Ringgit'),
			array('code' => 'NOK', 'name' => 'Norwegian Kroner'),
			array('code' => 'NZD', 'name' => 'New Zealand Dollar'),
			array('code' => 'PAB', 'name' => 'Panamanian Balboa'),
			array('code' => 'PEN', 'name' => 'Peruvian Nuevo Sol'),
			array('code' => 'PHP', 'name' => 'Philippine Peso'),
			array('code' => 'PKR', 'name' => 'Pakistan Rupee'),
			array('code' => 'PLN', 'name' => 'Polish Zloty'),
			array('code' => 'RON', 'name' => 'Romanian New Lei'),
			array('code' => 'RSD', 'name' => 'Serbian Dinar'),
			array('code' => 'RUB', 'name' => 'Russian Rouble'),
			array('code' => 'SEK', 'name' => 'Swedish Krona'),
			array('code' => 'SGD', 'name' => 'Singapore Dollar'),
			array('code' => 'THB', 'name' => 'Thai Baht'),
			array('code' => 'TND', 'name' => 'Tunisian Dinar'),
			array('code' => 'TRY', 'name' => 'Turkish Lira'),
			array('code' => 'TTD', 'name' => 'Trinidad/Tobago Dollar'),
			array('code' => 'TWD', 'name' => 'Taiwan Dollar'),
			array('code' => 'USD', 'name' => 'US Dollar'),
			array('code' => 'VEF', 'name' => 'Venezuelan Bolivar Fuerte'),
			array('code' => 'VND', 'name' => 'Vietnamese Dong'),
			array('code' => 'XAF', 'name' => 'CFA Franc BEAC'),
			array('code' => 'XCD', 'name' => 'East Caribbean Dollar'),
			array('code' => 'XPF', 'name' => 'CFP Franc'),
			array('code' => 'ZAR', 'name' => 'South African Rand')
		);
		
	
		function get_random_string($valid_chars, $length){
    
			// start with an empty random string
			$random_string = "";

			// count the number of chars in the valid chars string so we know how many choices we have
			$num_valid_chars = strlen($valid_chars);

			// repeat the steps until we've created a string of the right length
			for ($i = 0; $i < $length; $i++)
			{
				// pick a random number from 1 up to the number of valid chars
				$random_pick = mt_rand(1, $num_valid_chars);

				// take the random character out of the string of valid chars
				// subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
				$random_char = $valid_chars[$random_pick-1];

				// add the randomly-chosen char onto the end of our string so far
				$random_string .= $random_char;
			}

			// return our finished random string
			return $random_string;
		}// end of get_random_string()
		
		function sanitize($string){
			// check string value
			$string = mysql_escape_string(trim(strip_tags(stripslashes($string))));
			return $string;
		}// end of sanitize()
		
		function check_integer($which) {
			if(isset($_GET[$which])){
				if (intval($_GET[$which])>0) {
					return intval($_GET[$which]);
				} else {
					return false;
				}
			}
			return false;
		}//end of check_integer()

		function get_current_page() {
			if(($var=$this->check_integer('page'))) {
				//return value of 'page', in support to above method
				return $var;
			} else {
				//return 1, if it wasnt set before, page=1
				return 1;
			}
		}//end of method get_current_page()
		
		function doPages($page_size, $thepage, $query_string, $total=0, $keyword) {
			//per page count
			$index_limit = 10;
			
			//set the query string to blank, then later attach it with $query_string
			$query='';
			
			if(strlen($query_string)>0){
				$query = "&amp;".$query_string;
			}
				
			//get the current page number example: 3, 4 etc: see above method description
			$current = $this->get_current_page();
			
			$total_pages=ceil($total/$page_size);
			$start=max($current-intval($index_limit/2), 1);
			$end=$start+$index_limit-1;

			echo '<div id="page_num">';
			echo '<ul class="pagination">';

			if($current==1) {
				echo '';
			} else {
				$i = $current-1;
				echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" rel="nofollow" title="go to page '.$i.'">&laquo;</a></li>';
				//echo '<p>...</p>&nbsp;';
			}
				//<button>'.$i.'</button>
			if($start > 1) {
				$i = 1;
				echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
			}

			for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
				if($i==$current) {
					echo '<li class="active"><a>'.$i.'</a></li>';
				} else {
					echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
				}
			}

			if($total_pages > $end){
				$i = $total_pages;
				echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
			}

			if($current < $total_pages) {
				$i = $current+1;
				//echo '<p>...</p>&nbsp;';
				echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" rel="nofollow" title="go to page '.$i.'">&raquo;</a></li>';
			} else {
				echo '';
			}
			
			echo '</ul>';

			//if nothing passed to method or zero, then dont print result, else print the total count below:       
			if ($total != 0){
				//prints the total result count just below the paging
				echo '<p><br>( total '.$total.' )</p></div>';
			}else {
				echo '</div>';
			};
		 
		}//end of method doPages()
		
		
	}
?>