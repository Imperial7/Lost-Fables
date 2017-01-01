<?php
		include("template/main/session.php");
		include("template/main/include.php");
		include("template/main/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lost Fables | Login</title>
</head>
<body>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Login</h1>
				<form method="POST">
					<span>Username: <input type="text" value="" name="name" id="name" /></span>
					<span>Password: <input type="password" value="" name="password" id="password" /></span>

					<span><input type="submit" value="Submit" name="submit"></span>
				</form>
				<?php
				if ("POST" === $_SERVER["REQUEST_METHOD"]) {
					$myusername = mysqli_real_escape_string($db_conn, $_POST['name']);
					$mypassword = hash('sha512', isset($_POST['password']) ? $_POST['password'] : '');

					$sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
					$result = mysqli_query($db_conn, $sql);
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$admin = $row["admin"];
					$profileimage = $row["profileimage"];

					$count = mysqli_num_rows($result);
					
					if($count == 1) {
						$_SESSION['login_user'] = $myusername;
						$_SESSION['admin'] = $admin;
						
						echo "<script type='text/javascript'>window.top.location='test.php';</script>"; exit;
					}else {
						echo "Your Login Name or Password is invalid";
					}
				}
				?>
			</div>
			<div class="custom-footer">
				<div class="custom-profilefoot"></div>
			</div>
		</div>
	</div>
			<?php include("template/main/footer.php"); ?>
</body>
</html>