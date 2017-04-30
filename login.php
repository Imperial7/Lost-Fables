<?php
		//include("template/main/session.php");
		//include("template/main/include.php");
		//include("template/main/menu.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lost Fables | Login</title>
		<link rel="stylesheet" type="text/css" href="reset.php"/>
		<link rel="stylesheet" type="text/css" href="FontAwesome.php"/>
		<link rel="stylesheet" type="text/css" href="Imp_stylesheet.php"/>
	</head>

	<body>
		<div class="container">
			<div class="custom-profilecontainer">
				<div class="row">
					<div class="custom-profilehead"></div>
						<div class="container1">
							<img src="images/Imperial/LostFables_Logo.png"/>
							<form method="POST">
								<div class="form_input">
									<input type="text" placeholder="Username" name="username"/>
								</div>
								<div class="form_inputpass">
									<input type="password" placeholder="Password" name="password"/>
								</div>
							<input type="submit" name="submit" value="Login" class="btn-login"/>
							</form>
						</div>
					<?php
					/*
					if ("POST" === $_SERVER["REQUEST_METHOD"]) {
						$myusername = mysqli_real_escape_string($db_conn, $_POST['name']);
						$mypassword = hash('sha512', isset($_POST['password']) ? $_POST['password'] : '');

						$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
						$result = mysqli_query($db_conn, $sql);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						$admin = $row["admin"];
						$profileimage = $row["profileimage"];

						$count = mysqli_num_rows($result);
						
						if($count == 1)
						{
							$_SESSION['login_user'] = $myusername;
							$_SESSION['admin'] = $admin;
							
							echo "<script type='text/javascript'>window.top.location='test.php';</script>"; exit;
						}
						else
						{
							echo "Your Login Name or Password is invalid";
						}
					}
					*/
					?>
				</div>
				<div class="custom-footer">
					<div class="custom-profilefoot"></div>
				</div>
			</div>
		</div>
				<?php //include("template/main/footer.php"); ?>
	</body>
</html>