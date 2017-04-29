<?php
//CHECK ADMIN LEVEL OF LOGGED USER
						$loggeduser = $_SESSION['login_user'];
						$user = "SELECT * FROM user WHERE username = '$loggeduser'";
						$userresult = $db_conn->query($user);
						if ($userresult->num_rows > 0) {
							while($row = $userresult->fetch_assoc()) {
								$loggedadmin = $row["admin"];
								$profileimage = $row['profileimage'];
							}
						}
?>