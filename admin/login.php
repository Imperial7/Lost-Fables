<?php ob_start(); ?>
<!doctype html>
<html>
	<head>
		<!-- This includes the CSS into the script. -->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
	<body>

		<?php
			include("config.php");
			session_start();

		?>





		<!-- A wrapper is made to keep this content in line with each other. -->
			<div class="container">
						<!-- We create a form for the user to input their options -->
						<form role="form" action="" method="post">
							<!-- Player's Name and ID.  -->
							<div class="panel panel-default">
							  <div class="panel-heading" style="text-align: center;">
							  <h2>Login</h2>
							  </div>
							  <center><br/>
									<fieldset id="player">
										<b>Username</b><br />
										<input type="text" name="username" value="<?php echo $_POST['username'] ? $_POST['username'] : ''; ?>" /><br />
										<b>Password</b><br />
										<input type="password" name="password" value="<?php echo $_POST['password'] ? $_POST['password'] : ''; ?>" /><br />
										<button type="submit" class="btn btn-default">Login</button>
									</fieldset><br/>
								</center></div>
								<center><b>Having trouble logging in?</b> <a href="http://lostfables.com/admin/logout.php">Click Here</a> and try again!</center>
							</div>
						</form>
						<?php
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$myusername = mysqli_real_escape_string($db_conn,$_POST['username']);
      									$mypassword = hash('sha512', isset($_POST['password']) ? $_POST['password'] : '');

										$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
										$result = mysqli_query($db_conn,$sql);
										$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
										$admin = $row["admin"];

										$count = mysqli_num_rows($result);
										
										if($count == 1) {
											$_SESSION['login_user'] = $myusername;
											$_SESSION['admin'] = $admin;
											
											header('Location: index.php');
										}else {
											echo "Your Login Name or Password is invalid";
										}
									}
								?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php ob_end_flush() ?>