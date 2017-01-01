<?php
		include("template/main/session.php");
		include("template/main/include.php");
		include("template/main/menu.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lost Fables | Register</title>
</head>
<body>
	<div class="container">
		<div class="custom-profilecontainer">
			<div class="row">
				<div class="custom-profilehead"></div>
				<br />
				<h1>Register</h1>
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<form method="POST">
						<p><center>The following are required!</center></p>
						<span>Username: <input type="text" value="" name="name" id="name" /></span>
						<span>Password: <input type="password" value="" name="password" id="password" /></span>
						<span>Email: <input type="text" value="" name="email" id="email" /></span><hr />
						<p><center>The following are Optional</center></p>
						<span>I am a:
						<select name="profession" id="profession">
						  <option value="writer">Writer</option>
						  <option value="artist">Artist</option>
						  <option value="poet">Poet</option>
						  <option value="developer">Games Developer</option>
						  <option value="ninja">Ninja</option>
						</select></span>
						<span>Location: <input type="text" value="" name="location" id="location" placeholder="Where are you from?" /></span>
						<hr/>
						<span>Spam Check: <input type="text" value="" name="spam" id="spam" placeholder="What is 13 - 5?" /></span>

						<span><input type="submit" value="Submit" name="submit"></span>
					</form>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
				
				<?php
				if('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && $_POST['spam'] == '8') {
					$name = mysqli_real_escape_string($db_conn, $_POST['name']);
					$password = hash('sha512', isset($_POST['password']) ? $_POST['password'] : '');
					$email = mysqli_real_escape_string($db_conn, $_POST['email']);
					$location = mysqli_real_escape_string($db_conn, $_POST['location']);
					$profession = $_POST['profession'];
					$insert = "INSERT INTO `user` (`username`, `email`, `password`, `location`, `profession`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $location . "', '" . $profession . "')";
					$notification = "Welcome to Lost Fables.";
					$welcome = "INSERT INTO `notification` (`notification`, `link`, `owner`) VALUES ('" . $notification . "', 'thankyou.php', '" . $name . "')";
				    if($db_conn->query($welcome)) {}
				    if($db_conn->query($insert)) {
				        echo "<script type='text/javascript'>window.top.location='test.php';</script>"; exit;
				    } else {
				        echo "Error: " . $insert . "<br>" . $db_conn->error;
					}

				}
				
				?>
			</div>
		</div>
	</div>
</body>
</html>