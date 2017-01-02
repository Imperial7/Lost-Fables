<?php
//CHECK ADMIN LEVEL OF LOGGED USER
						$loggeduser = $_SESSION['login_user'];
						$admincheck = "SELECT admin FROM user WHERE username = '$loggeduser'";
						$admincheckresult = $db_conn->query($admincheck);
						if ($admincheckresult->num_rows > 0) {
							while($row = $admincheckresult->fetch_assoc()) {
								$loggedadmin = $row["admin"];
							}
						}
?>