<?php

		// the name of the database host
			$db_host = "localhost";
			// the name of the database itself
			$db_name = "lostfabl_main";
			// the name of the database username
			$db_user = "lostfabl_main";
			// the name of the database password
			$db_pass = "@kh#tmJWwWl4?HwWl4?HLIeI?pLIeI?pZx[=";
			
			
			/*
			*  This function will connect to the database.
			*/
			
				// Create the database connection
				$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
				// if (!$db_conn) {
				//     die("Connection failed: " . mysqli_connect_error());
				// }
				// else {
				// 	echo "Connected successfully";
				// }

?>